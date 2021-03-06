<?php
////récupere dans la base de donnée le slug
function getMovieBySlug($slug){
  global $pdo;
  $sql = "SELECT * FROM movies_full
          WHERE slug = :slug";
  $query = $pdo->prepare($sql);
  $query->bindValue(':slug',$slug,PDO::PARAM_STR);
  $query->execute();
  return $query->fetch();
}
function getMovieById($id){
  global $pdo;
  $sql = "SELECT * FROM movies_full WHERE id = :id";
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();
  $data = $query->fetch();
  return $data;
}
function voirFilmFavoris($id_user) {
	global $pdo;

	$sql = "SELECT f.id AS idnote, m.title AS title,m.id AS id, m.year,directors FROM user_note AS f
				LEFT JOIN movies_full AS m
				ON f.id_movie = m.id
				WHERE id_user = $id_user
        AND note IS NULL";

	$query = $pdo->prepare($sql);
	$query->execute();
	$results = $query->fetchAll();
	return $results;
}



////////////////////////////////////
// articles
//////////////////////////////////////////
// function getAllArticles()
// {
//   global $pdo;
//   $sql = "SELECT * FROM articles ORDER BY created_at DESC";
//   $query = $pdo->prepare($sql);
//   $query->execute();
//   $data = $query->fetchAll();
//   return $data;
// }


// function countArticles($status = 'all')
// {
//   global $pdo;
//   if($status == 'all') {
//     $sql = "SELECT COUNT(id) FROM articles";
//   } elseif($status == 'status') {
//     $sql = "SELECT COUNT(id) FROM articles WHERE status = 1";
//   }
//   $query = $pdo->prepare($sql);
//   $query->execute();
//   $totalItems = $query->fetchColumn();
//   return $totalItems;
// }


//////// Virgin ====>Pagination

// function getArticlespaginate($itemsPerPage,$offset)
// {
//   global $pdo;
//   $sql = "SELECT * FROM articles
//           WHERE status = 1
//           ORDER BY created_at DESC
//           LIMIT $itemsPerPage OFFSET $offset";
//   $query = $pdo->prepare($sql);
//   $query->execute();
//   $articles = $query->fetchAll();
//   return $articles;
// }

// function searchArticles($search){
//   global $pdo;
//   $sql = "SELECT * FROM articles WHERE title LIKE :search OR content LIKE :search";
//   $stmt = $pdo->prepare($sql);
//   $stmt->bindValue(':search','%'.$search.'%', PDO::PARAM_STR);
//   $stmt->execute();
//   return $stmt->fetchAll();
// }

////////////////////////////////////
// comments
//////////////////////////////////////////
// function getCommentsForThisArticle($id)
// {
//   global $pdo;
//   $sql = "SELECT * FROM comments WHERE id_article = :id AND status = 1";
//   $query = $pdo->prepare($sql);
//   $query->bindValue(':id',$id,PDO::PARAM_INT);
//   $query->execute();
//   $data = $query->fetchAll();
//   return $data;
// }
