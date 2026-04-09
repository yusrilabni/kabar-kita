<?php

namespace App\Repositories;

use App\Models\Invitation;
use Illuminate\Database\Eloquent\Collection;

class InvitationRepository
{
    public function getAllByUserId(int $userId): Collection
    {
        return Invitation::where('user_id', $userId)->with('theme')->get();
    }

    public function findById(int $id): ?Invitation
    {
        return Invitation::with(['theme', 'guests', 'rsvps'])->find($id);
    }

    public function findBySlug(string $slug): ?Invitation
    {
        return Invitation::where('slug', $slug)->with(['theme', 'rsvps'])->first();
    }

    public function create(array $data): Invitation
    {
        return Invitation::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $invitation = Invitation::findOrFail($id);
        return $invitation->update($data);
    }

    public function delete(int $id): bool
    {
        return Invitation::destroy($id) > 0;
    }
}
