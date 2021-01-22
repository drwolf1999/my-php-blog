CREATE TABLE `post` (
    `title`     VARCHAR (20) NOT NULL,
    `content`   LONGTEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
ALTER TABLE post ADD COLUMN postId INT PRIMARY KEY AUTO_INCREMENT;
ALTER TABLE `post` ADD COLUMN `writeDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;