<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    function getDataFromApi() {

        try {

            $response = Http::get(url: 'https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0');

            if ($response->successful()) {

                $jsonData = $response->json();

                $perPage = 10;
                $page = request('page', 1);

                $totalItems = count($jsonData['users']);
                $start = ($page - 1) * $perPage;
                $slice = array_slice($jsonData['users'], $start, $perPage);

                $data = new Collection($slice);
                $paginator = new LengthAwarePaginator($data, $totalItems, $perPage, $page);

                return view('home')->with('paginator', $paginator);

            } else {
                echo "Erro na solicitação HTTP: " . $response->status();
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}
