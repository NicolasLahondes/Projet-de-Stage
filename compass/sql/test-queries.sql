
DELETE `user_artist` FROM `user_artist`
WHERE `id_artist` = 3;

DELETE `artist` FROM `artist`
WHERE `spotify_id` = 3;

DELETE `artist_images` FROM `artist_images`
JOIN `artist` ON `id_image` = `id`
WHERE `artist`.`id_image` = 3;