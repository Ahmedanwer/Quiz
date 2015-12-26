
CREATE DATABASE IF NOT EXISTS `quiz`;
USE `quiz`;


CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL UNIQUE,
  `faculty` varchar(200) NOT NULL,
  `university` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL ,
  `type` int(11) NOT NULL
);

CREATE TABLE IF NOT EXISTS `question` (
  `ID` int(11) PRIMARY KEY AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `quiz_ID` int(11) NOT NULL REFERENCES quiz(ID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `choices` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL REFERENCES question(ID) ON UPDATE CASCADE ON DELETE CASCADE,
  `choice` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`,`question_id`)
);

CREATE TABLE IF NOT EXISTS `answer` (
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_answer` int(11) NOT NULL,
  PRIMARY KEY (`user_id`, `question_id`)
);


CREATE TABLE IF NOT EXISTS `group` (
  `ID` int(11) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `instructor_id` int(11) NOT NULL REFERENCES user(ID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `join` (
  `group_id` int(11) NOT NULL REFERENCES `group`(ID),
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`student_id`)
);

CREATE TABLE IF NOT EXISTS `quiz` (
  `ID` int(11) PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL REFERENCES user(ID) ON UPDATE CASCADE ON DELETE CASCADE,
  `group_id` int(11) NOT NULL REFERENCES `group`(ID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `take` (
  `quiz_id` int(11) NOT NULL REFERENCES quiz(ID) ON UPDATE CASCADE ON DELETE CASCADE,
  `student_id` int(11) NOT NULL REFERENCES user(ID) ON UPDATE CASCADE ON DELETE CASCADE,
  `student_mark` int(11) NOT NULL,
  PRIMARY KEY (`quiz_id`,`student_id`)
);






