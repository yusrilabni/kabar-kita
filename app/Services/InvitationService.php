<?php

namespace App\Services;

use App\Models\Invitation;
use App\Repositories\InvitationRepository;
use Illuminate\Support\Str;

class InvitationService
{
    public function __construct(
        protected InvitationRepository $repository
    ) {}

    public function createInvitation(array $data, int $userId): Invitation
    {
        $data['user_id'] = $userId;
        $data['slug'] = $this->generateUniqueSlug($data['slug'] ?? ($data['bride_name'] . '&' . $data['groom_name']));
        
        return $this->repository->create($data);
    }

    public function generateUniqueSlug(string $slug): string
    {
        // Decode to handle special characters like &
        $slug = urldecode($slug);
        
        // Basic slugification but keep & and - as allowed in your prompt
        $slug = preg_replace('/[^A-Za-z0-9&\-]/', '', $slug);
        
        $originalSlug = $slug;
        $counter = 1;
        
        while ($this->repository->findBySlug($slug)) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return strtolower($slug);
    }

    public function updateInvitation(int $id, array $data): bool
    {
        if (isset($data['slug'])) {
            $current = $this->repository->findById($id);
            if ($current && $current->slug !== $data['slug']) {
                $data['slug'] = $this->generateUniqueSlug($data['slug']);
            }
        }
        
        return $this->repository->update($id, $data);
    }

    public function getPublicInvitation(string $slug): ?Invitation
    {
        return $this->repository->findBySlug($slug);
    }
}
