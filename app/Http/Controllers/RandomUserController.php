<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RandomUserController extends Controller
{
    public function getUsers()
    {
        $response = Http::get('https://randomuser.me/api/', [
            'results' => 5
        ]);
        
        $users = $response->json()['results'];
        $fullNames = array_map(function($user) {
            return $user['name']['first'] . ' ' . $user['name']['last'];
        }, $users);

        $letters = [];
        foreach ($fullNames as $name) {
            $name = str_replace(' ', '', $name);
            foreach (str_split($name) as $letter) {
                if (isset($letters[$letter])) {
                    $letters[$letter]++;
                } else {
                    $letters[$letter] = 1;
                }
            }
        }
        
        arsort($letters);
        $mostCommonLetter = array_key_first($letters);

        return response()->json([
            'users' => $users,
            'most_common_letter' => $mostCommonLetter
        ]);
    }
}

