CREATE TABLE `post` (
    `title`     VARCHAR (20) NOT NULL,
    `content`   LONGTEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
ALTER TABLE post ADD COLUMN postId INT PRIMARY KEY AUTO_INCREMENT;
ALTER TABLE `post` ADD COLUMN `writeDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

CREATE TABLE `myblog`.`comment` (
    `commentID` INT NOT NULL AUTO_INCREMENT,
    `parentComment` INT NULL,
    `username` VARCHAR(45) NULL,
    `password` VARCHAR(45) NULL,
    `updateAt` DATETIME NULL,
    `body` LONGTEXT NULL,
    PRIMARY KEY (`commentID`),
    UNIQUE INDEX `commentID_UNIQUE` (`commentID` ASC) VISIBLE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;

ALTER TABLE `myblog`.`comment`
    ADD INDEX `reply_idx` (`parentComment` ASC) VISIBLE;
;
ALTER TABLE `myblog`.`comment`
    ADD CONSTRAINT `reply`
        FOREIGN KEY (`parentComment`)
            REFERENCES `myblog`.`comment` (`commentID`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION;
