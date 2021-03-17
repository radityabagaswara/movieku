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
        $stmt->bind_param("ii", $id_genre, $id_movie);

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

    public static function get_movie($id)
    {
        $query = "SELECT * FROM movies WHERE id = ?";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_assoc();
    }

    public static function get_movie_chara($id)
    {
        $arr = array();

        $query = 'SELECT a.name as artist_name, a.photo as artist_photo, c.character_name, c.character_role FROM artist_movies c INNER JOIN artist a ON a.id = c.artist_id INNER JOIN movies m ON m.id = c.movies_id WHERE m.id = ?';
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();

        while ($row = $res->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    public static function get_movie_genre($id)
    {
        $query = "SELECT g.name FROM genres_movies gm INNER JOIN genres g ON g.id = gm.genres_id INNER JOIN movies m ON m.id = gm.movies_id WHERE m.id = ?";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();

        while ($row = $res->fetch_assoc()) {
            $arr[] = $row['name'];
        }

        return $arr;
    }

    public static function get_total_page($max, $name = null)
    {
        if (isset($name)) {
            $s = "%" . $name . "%";

            $query = "SELECT COUNT(*) as count FROM movies WHERE name like ?";
            $stmt = self::$db->prepare($query);
            $stmt->bind_param("s", $s);
            $stmt->execute();
            $res = $stmt->get_result();
        } else {
            $query = "SELECT COUNT(*) as count FROM movies;";
            $res = self::$db->query($query);
        }

        $data = $res->fetch_assoc();
        return ceil($data['count'] / $max);
    }

    public static function get_movies_list($start, $max)
    {
        $arr = array();

        $query = "SELECT * FROM movies ORDER BY id ASC LIMIT ?, ? ";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("ii", $start, $max);
        $stmt->execute();
        $res = $stmt->get_result();

        while ($row = $res->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    public static function search_movie($name, $min, $max)
    {
        $arr = array();
        $s = "%" . $name . "%";

        $query = "SELECT * FROM movies WHERE name LIKE ? LIMIT ?, ? ";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param("sii", $s, $min, $max);
        $stmt->execute();
        $res = $stmt->get_result();

        while ($row = $res->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }
}
