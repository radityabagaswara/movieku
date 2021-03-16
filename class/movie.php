<?php
require_once("sql.php");

class Movie extends Connection
{

    function __construct()
    {
        Connection::__construct();
    }

    public static function insert_movie($name, $synopsis, $rating, $release_date, $is_serial)
    {
        $query = "INSERT INTO movies (name, synopsis, rating, release_date, is_serial) VALUES (?,?,?,?,?)";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("ssdsi", $name, $synopsis, $rating, $release_date, $is_serial);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public static function insert_genre_movie($id_movie, $id_genre)
    {
        $query = "INSERT INTO genres_movies (genres_id, movies_id) VALUES (?,?)";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("ii", $id_movie, $id_genre);

        return $stmt->execute();
    }

    public static function insert_chara_movie($id_chara, $id_movie, $char_name, $char_role)
    {
        $query = "INSERT INTO artist_movies (artist_id, movies_id, character_name, character_role) VALUES (?,?,?,?)";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("iiss", $id_chara, $id_movie, $char_name, $char_role);

        return $stmt->execute();
    }

    public static function add_artist($name, $gender, $photo)
    {
        $query = "INSERT INTO artist (name, gender, photo) VALUES (?,?,?)";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("sss", $name, $gender, $photo);

        return $stmt->execute();
    }

    public static function add_genre($name)
    {
        $query = "INSERT INTO genres (name) VALUES (?)";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("s", $name);

        return $stmt->execute();
    }

    public static function update_photo($id_movie, $path)
    {
        $query = "UPDATE movies SET poster = ? WHERE id = ?";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("si", $path, $id_movie);

        return $stmt->execute();
    }

    public static function get_artist()
    {
        $arr = array();

        $query = "SELECT * FROM artist";
        $res = self::$db->query($query);
        while ($row = $res->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }


    public static function get_genre()
    {
        $arr = array();

        $query = "SELECT * FROM genres";
        $res = self::$db->query($query);
        while ($row = $res->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }
}
