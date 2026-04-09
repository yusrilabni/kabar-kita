<?php

namespace App\Http\Controllers\Invitation;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Theme;
use App\Services\InvitationService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function __construct(
        protected InvitationService $service
    ) {}

    public function index()
    {
        $invitations = Auth::user()->invitations()->with('theme')->get();
        return Inertia::render('Invitation/Index', [
            'invitations' => $invitations
        ]);
    }

    public function create()
    {
        $themes = Theme::all();
        return Inertia::render('Invitation/Create', [
            'themes' => $themes
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bride_name' => 'required|string|max:255',
            'groom_name' => 'required|string|max:255',
            'theme_id' => 'required|exists:themes,id',
            'wedding_date' => 'required|date',
            'slug' => 'nullable|string|unique:invitations,slug|regex:/^[A-Za-z0-9&-]+$/',
        ]);

        $this->service->createInvitation($validated, Auth::id());

        return redirect()->route('invitation.index')->with('message', 'Undangan berhasil dibuat.');
    }

    public function edit($id)
    {
        $invitation = Invitation::where('user_id', Auth::id())->findOrFail($id);
        $themes = Theme::all();
        
        return Inertia::render('Invitation/Edit', [
            'invitation' => $invitation,
            'themes' => $themes
        ]);
    }

    public function update(Request $request, $id)
    {
        $invitation = Invitation::where('user_id', Auth::id())->findOrFail($id);
        
        $validated = $request->validate([
            'bride_name' => 'required|string|max:255',
            'groom_name' => 'required|string|max:255',
            'theme_id' => 'required|exists:themes,id',
            'wedding_date' => 'required|date',
            'slug' => 'nullable|string|regex:/^[A-Za-z0-9&-]+$/|unique:invitations,slug,' . $id,
            'location_name' => 'nullable|string',
            'location_address' => 'nullable|string',
            'location_maps_embed' => 'nullable|string',
            'music_url' => 'nullable|string',
        ]);

        $this->service->updateInvitation($id, $validated);

        return redirect()->back()->with('message', 'Undangan berhasil diperbarui.');
    }

    public function showPublic($slug)
    {
        $invitation = $this->service->getPublicInvitation($slug);
        
        if (!$invitation || !$invitation->is_published) {
            abort(404);
        }

        return Inertia::render($invitation->theme->component_name, [
            'invitation' => $invitation,
            'to' => request()->query('to')
        ]);
    }

    public function previewTheme($theme_id)
    {
        $theme = Theme::findOrFail($theme_id);
        
        // FOTO DEMO BANYAK (15 FOTO)
        $demoPhotos = [];
        for($i=1; $i<=15; $i++) {
            $demoPhotos[] = ['url' => "https://picsum.photos/seed/" . ($theme_id * 100 + $i) . "/800/" . ($i % 2 == 0 ? '1200' : '800')];
        }

        $demoInvitation = (object)[
            'id' => 0,
            'bride_name' => 'Siti Aminah, S.Pd',
            'bride_nickname' => 'Siti',
            'bride_parent_name' => 'Bpk. Ahmad Fauzi & Ibu Mariam',
            'bride_ig' => 'sitiaminah_id',
            'groom_name' => 'Budi Santoso, M.T',
            'groom_nickname' => 'Budi',
            'groom_parent_name' => 'Bpk. Hendra Wijaya & Ibu Ratna',
            'groom_ig' => 'budisantoso_official',
            'quote' => "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.",
            'wedding_date' => now()->addMonths(3)->format('Y-m-d'),
            
            'akad_date' => now()->addMonths(3)->format('Y-m-d'),
            'akad_time' => '08:00 WIB - 10:00 WIB',
            'akad_location' => 'Masjid Agung Baiturrahman',
            'akad_address' => 'Jl. Pahlawan No. 45, Jakarta Pusat',
            'akad_maps_embed' => 'https://maps.app.goo.gl/uXvTPvXvXvXvXvXv',
            
            'reception_date' => now()->addMonths(3)->format('Y-m-d'),
            'reception_time' => '11:00 WIB - 14:00 WIB',
            'reception_location' => 'Gedung Serbaguna Kencana',
            'reception_address' => 'Jl. Melati Raya No. 12, Jakarta Selatan',
            'reception_maps_embed' => 'https://maps.app.goo.gl/uXvTPvXvXvXvXvXv',
            
            'streaming_link' => 'https://youtube.com/live/contoh',
            'music_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
            'is_published' => true,
            
            'love_story' => [
                ['year' => '2021', 'title' => 'Pertemuan Pertama', 'text' => 'Kami pertama kali bertemu dalam sebuah acara seminar pendidikan di Jakarta.'],
                ['year' => '2023', 'title' => 'Menjalin Kedekatan', 'text' => 'Setelah dua tahun berteman baik, kami memutuskan untuk memulai langkah yang lebih serius.'],
                ['year' => '2026', 'title' => 'Ikatan Suci', 'text' => 'Kami memohon doa restu Anda untuk mengiringi langkah kami memulai kehidupan baru.']
            ],
            
            'gallery' => $demoPhotos,
            
            'digital_gifts' => [
                ['bank' => 'BCA', 'no' => '9876543210', 'name' => 'Budi Santoso'],
                ['bank' => 'Mandiri', 'no' => '0123456789', 'name' => 'Siti Aminah']
            ],
            'theme' => $theme,
            'rsvps' => []
        ];

        return Inertia::render($theme->component_name, [
            'invitation' => $demoInvitation,
            'to' => 'Nama Tamu Undangan'
        ]);
    }

    public function publish($id)
    {
        $invitation = Invitation::where('user_id', Auth::id())->findOrFail($id);
        $invitation->update(['is_published' => !$invitation->is_published]);
        
        return redirect()->back()->with('message', $invitation->is_published ? 'Undangan diterbitkan!' : 'Undangan ditarik.');
    }
}
