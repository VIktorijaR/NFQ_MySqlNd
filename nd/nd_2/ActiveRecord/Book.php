<?php

/**
 * Created by PhpStorm.
 * User: vika
 * Date: 16.11.15
 * Time: 17.50
 */
class Book
{
    private $bookId;
    private $authorId;
    private $title;
    private $year;
    private $author;
    private $gendre;
    private $MoreAuthors;

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param mixed $authorId
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getGendre()
    {
        return $this->gendre;
    }

    /**
     * @param mixed $gendre
     */
    public function setGendre($gendre)
    {
        $this->gendre = $gendre;
    }

    /**
     * @return mixed
     */
    public function getMoreAuthors()
    {
        return $this->MoreAuthors;
    }

    /**
     * @param mixed $MoreAuthors
     */
    public function setMoreAuthors($MoreAuthors)
    {
        $this->MoreAuthors = $MoreAuthors;
    }

    public  function loadById($id){

            $connection = new mysqli("127.0.0.1", "root", "root", "Books", 3000);
            if ($connection->connect_errno) {
                echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
            }
            echo $connection->host_info . "\n";

        $rezUzklaus = $connection->query('SELECT * FROM Books WHERE Books.bookId='.$id);
        $rez = $rezUzklaus -> fetch_assoc();

        $this->year=$rez['bookId'];
        $this->title=$rez['title'];
    }
    public function loadAll(){
        $connection = new mysqli("127.0.0.1", "root", "root", "Books", 3000);
        if ($connection->connect_errno) {
            echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
        }
        $query = "SELECT Books.bookId, Books.title, Books.year, Genre.name, GROUP_CONCAT(Authors.name) FROM Books_Authors INNER JOIN Books ON Books_Authors.bookId = Books.bookId LEFT JOIN Genre ON Books.genreId = Genre.genreId INNER JOIN Authors ON Books_Authors.authorId = Authors.authorId WHERE Books.bookId = '$id' GROUP BY Books.title";
        $result = mysqli_query($this->connection, $query);
        $row = mysqli_fetch_row($result);
        $this->bookId = $row[0];
        $this->authorId = $row[1];
        $this->title = $row[2];
        $this->year = $row[3];
        $this->author = $row[4];
        $this->genre = $row[5];
        $this->MoreAuthors = $row[6];
    }
}