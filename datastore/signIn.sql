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
 `roleID`   INT NOT NULL AUTO_INCREMENT,
 `role`  VARCHAR(15) NOT NULL,

PRIMARY KEY (`roleID`)
);

-- ************************************** `Student`

CREATE TABLE `Student`
(
 `StudentID`    INT NOT NULL ,
 `Student_Name` VARCHAR(45) NOT NULL ,

PRIMARY KEY (`StudentID`)
);

-- ************************************** `Student_Course`

CREATE TABLE `Student_Course`
(
 `StudentID` INT NOT NULL ,
 `CourseID`  INT NOT NULL ,

PRIMARY KEY (`StudentID`, `CourseID`),
KEY `fkIdx_49` (`StudentID`),
CONSTRAINT `FK_49` FOREIGN KEY `fkIdx_49` (`StudentID`) REFERENCES `Student` (`StudentID`),
KEY `fkIdx_53` (`CourseID`),
CONSTRAINT `FK_53` FOREIGN KEY `fkIdx_53` (`CourseID`) REFERENCES `CourseSection` (`CourseID`)
);

-- ************************************** `User`

CREATE TABLE `User`
(
 `userID`    INT NOT NULL AUTO_INCREMENT ,
 `userLogin` VARCHAR(45) NOT NULL ,
 `userPass`  VARCHAR(45) NOT NULL ,
 `userFName` VARCHAR(45) NOT NULL ,
 `userLName` VARCHAR(45) NOT NULL ,
 `roleID`    INT NOT NULL ,

PRIMARY KEY (`userID`),
KEY `fkIdx_64` (`roleID`),
CONSTRAINT `FK_64` FOREIGN KEY `fkIdx_64` (`roleID`) REFERENCES `Role` (`roleID`)
);
