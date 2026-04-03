<?php

require_once("get-proxy.php");// au lycée pour faire des requêtes https vous avons besoin d'indiquer le proxy


    //fonction qui retourne dans un tableau asociatif les 20 films les plus populaires 
    function popularMovies(){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=$key&language=fr-FR";
        $response = getProxy($url);
        //$response = file_get_contents("https://api.themoviedb.org/3/movie/popular?api_key=$key&language=fr-FR");
       
        $result = json_decode($response, true);
        return $result['results'];
      }
      function toprated(){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $url = "https://api.themoviedb.org/3/movie/top_rated?api_key=$key&language=fr-FR";
        $response = getProxy($url);
        //$response = file_get_contents("https://api.themoviedb.org/3/movie/popular?api_key=$key&language=fr-FR");
       
        $result = json_decode($response, true);
        return $result['results'];
      }
      function filmParGenre($id){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $url = "https://api.themoviedb.org/3/discover/movie?api_key=$key&language=fr-FR&with_genres=$id";
        $response = getProxy($url);
        //$response = file_get_contents("https://api.themoviedb.org/3/movie/popular?api_key=$key&language=fr-FR");
       
        $result = json_decode($response, true);
        return $result['results'];
      }
      function detail($id){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $url = "https://api.themoviedb.org/3/movie/$id?api_key=$key&language=fr-FR";
        $response = getProxy($url);
        //$response = file_get_contents("https://api.themoviedb.org/3/movie/popular?api_key=$key&language=fr-FR");
       
        $result = json_decode($response, true);
        return $result;
        }
        function acteurs($id){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $url = "https://api.themoviedb.org/3/movie/$id/credits?api_key=$key&language=fr-FR";
    
        $response = getProxy($url);
        $result = json_decode($response, true);

        return array_slice($result['cast'], 0, 4); // 4 acteurs
        }
            function detailActeur($id){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $url = "https://api.themoviedb.org/3/person/$id?api_key=$key&language=fr-FR";

        $response = getProxy($url);
        return json_decode($response, true);
        }

        function filmsActeur($id){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $url = "https://api.themoviedb.org/3/person/$id/movie_credits?api_key=$key&language=fr-FR";

        $response = getProxy($url);
        $result = json_decode($response, true);

        return array_slice($result['cast'], 0, 8); // 8 films
        }
    
        function trailer($id){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $url = "https://api.themoviedb.org/3/movie/$id/videos?api_key=$key&language=fr-FR";

        $response = getProxy($url);
        $result = json_decode($response, true);

        if (!empty($result['results'])) {
            foreach ($result['results'] as $video) {
                if ($video['type'] == "Trailer" && $video['site'] == "YouTube") {
                    return $video['key']; // ID YouTube
              }
          }
        }

        return null;
      }
    
?>

