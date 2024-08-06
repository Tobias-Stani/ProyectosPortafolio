<?php

declare(strict_types=1);

class NextMovie
{
    public function __construct(
        private string $title,
        private int $days_until,
        private string $following_productiion,
        private string $release_date,
        private string $poster_url,
        private string $overview,

    )

    {}

    public function get_until_message(): string {

        $days = $this->days_until;

        return match (true) {
            $days == 0 => "hoy se estrena!",
            $days < 7 => "Esta semana se estrena",
            $days < 30 => "Esta mes se estrena",
            default => "$days días para el estreno",
        };
    }

    public static function fetch_and_create_movie(string $api_url): NextMovie
     {
        $result = file_get_contents($api_url);
        if ($result === false) {
            return null; // Handle error appropriately
        }
        $data = json_decode($result, true);
        if ($data === null) {
            return null; // Handle error appropriately
        }
        
        return new self(
            $data["title"],
            $data["days_until"],
            $data["following_productiion"]['title'] ?? "no tiene",
            $data["release_date"],
            $data["poster_url"],
            $data["overview"],
        );
    }
    
    public function get_data()
    {
        return get_object_vars($this);
    }

    function render_template(string $template, array $data = []){

        extract($data);
        require "templates/$template.php";
    
    }

}