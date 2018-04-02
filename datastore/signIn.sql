-- ************************************** `Class`

CREATE TABLE `Class`
(
 `classID`                 INT NOT NULL AUTO_INCREMENT ,
 `className`               VARCHAR(45) NOT NULL ,
 `classSection`            VARCHAR(45) NOT NULL ,
 `classSemester`           VARCHAR(7) NOT NULL ,
 `classInstructor`         VARCHAR(45) NOT NULL ,
 `classScheduleMonStart`   INT(4) NOT NULL ,
 `classScheduleMonEnd`     INT(4) NOT NULL ,
 `classScheduleTuesStart`  INT(4) NOT NULL ,
 `classScheduleTuesEnd`    INT(4) NOT NULL ,
 `classScheduleWedStart`   INT(4) NOT NULL ,
 `classScheduleWedEnd`     INT(4) NOT NULL ,
 `classScheduleThursStart` INT(4) NOT NULL ,
 `classScheduleThursEnd`   INT(4) NOT NULL ,
 `classScheduleFriStart`   INT(4) NOT NULL ,
 `classScheduleFriEnd`     INT(4) NOT NULL ,

PRIMARY KEY (`classID`)
);

-- ************************************** `Role`

CREATE TABLE `Role`
(
 `roleID`   INT NOT NULL AUTO_INCREMENT ,
 `faculty`  INT NOT NULL ,
 `admin`    INT NOT NULL ,
 `webAdmin` INT NOT NULL ,
 `exec`     INT NOT NULL ,

PRIMARY KEY (`roleID`)
);

-- ************************************** `Attendee`

CREATE TABLE `Attendee`
(
 `studentID` INT NOT NULL AUTO_INCREMENT ,
 `name`      VARCHAR(45) NOT NULL ,
 `classID`   INT NOT NULL ,

PRIMARY KEY (`studentID`),
KEY `fkIdx_71` (`classID`),
CONSTRAINT `FK_71` FOREIGN KEY `fkIdx_71` (`classID`) REFERENCES `Class` (`classID`)
);

-- ************************************** `User`

CREATE TABLE `User`
(
 `userID`    INT NOT NULL AUTO_INCREMENT ,
 `userLogin` VARCHAR(45) NOT NULL ,
 `userName`  VARCHAR(45) NOT NULL ,
 `roleID`    INT NOT NULL ,

PRIMARY KEY (`userID`),
KEY `fkIdx_64` (`roleID`),
CONSTRAINT `FK_64` FOREIGN KEY `fkIdx_64` (`roleID`) REFERENCES `Role` (`roleID`)
);
