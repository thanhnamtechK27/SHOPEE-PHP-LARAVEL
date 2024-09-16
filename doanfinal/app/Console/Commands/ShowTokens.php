<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Sanctum\PersonalAccessToken;
class ShowTokens extends Command
{
    protected $signature = 'tokens:show';
    protected $description = 'Show all personal access tokens';

    public function handle()
    {
        $tokens = PersonalAccessToken::all();
        $this->info('Tokens:');
        foreach ($tokens as $token) {
            $this->line($token->token);
        }
    }
    public function createToken()
    {
        // Lấy người dùng đầu tiên hoặc người dùng cụ thể
        $user = User::first(); // Thay thế bằng User::find($userId) nếu cần

        // Tạo token mới
        $token = $user->createToken('Test Token')->plainTextToken;

        // Trả về token dưới dạng JSON
        return response()->json(['token' => $token]);
    }
}
