-- ======================================================================
-- ===   Sql Script for Database : Inceptio - Scansysteem
-- ===
-- === Build : 8
-- ======================================================================

CREATE TABLE users
  (
    user_id        int            unique not null	AUTO_INCREMENT,
    user_name      varchar(512)   unique not null,
    user_password  varchar(512)   not null,
    user_type      int            not null,

    primary key(user_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE clients
  (
    client_id       int            unique not null	AUTO_INCREMENT,
    client_name     varchar(512)   not null,
    client_address  varchar(512),
    client_phone    varchar(512),
    user_id         int,

    primary key(client_id),

    foreign key(user_id) references users(user_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE surveys
  (
    survey_id           int            unique not null	AUTO_INCREMENT,
    survey_name         varchar(512)   unique,
    survey_author       int            not null,
    survey_participant  int            not null,
    survey_chapters     varchar(512),

    primary key(survey_id),

    foreign key(survey_author) references users(user_id),
    foreign key(survey_participant) references users(user_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE chapters
  (
    chapter_id           int            unique not null	AUTO_INCREMENT,
    chapter_name         varchar(512)   not null,
    chapter_description  varchar(512),

    primary key(chapter_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE questiontypes
  (
    questiontype_id    int            unique not null	AUTO_INCREMENT,
    questiontype_name  varchar(512)   unique not null,

    primary key(questiontype_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE questions
  (
    question_id      int            unique not null	AUTO_INCREMENT,
    question_name    varchar(512)   not null,
    question_help    varchar(512),
    chapter_id       int            not null,
    questiontype_id  int            not null,

    primary key(question_id),

    foreign key(chapter_id) references chapters(chapter_id),
    foreign key(questiontype_id) references questiontypes(questiontype_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE answers
  (
    answer_id     int            unique not null	AUTO_INCREMENT,
    answer_name   varchar(512)   not null,
    answer_value  int,
    question_id   int            not null,

    primary key(answer_id),

    foreign key(question_id) references questions(question_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE reports
  (
    report_id     int            unique not null	AUTO_INCREMENT,
    report_value  varchar(512)   not null,
    answer_id     int            not null,

    primary key(report_id),

    foreign key(answer_id) references answers(answer_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE survey_question_answer
  (
    survey_question_answer_id  int            unique not null	AUTO_INCREMENT,
    survey_id                  int            not null,
    question_id                int            not null,
    answer_id                  int            not null,
    report_value               varchar(512),

    primary key(survey_question_answer_id),

    foreign key(survey_id) references surveys(survey_id),
    foreign key(question_id) references questions(question_id),
    foreign key(answer_id) references answers(answer_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

