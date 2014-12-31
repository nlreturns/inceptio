-- ======================================================================
-- ===   Sql Script for Database : Inceptio - Scansysteem
-- ===
-- === Build : 3
-- ======================================================================

CREATE TABLE users
  (
    user_id        int            unique not null,
    user_name      varchar(256)   unique not null,
    user_password  varchar(256)   not null,
    user_type      int            not null,

    primary key(user_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE surveys
  (
    survey_id           int            unique not null,
    survey_name         varchar(256)   unique,
    survey_author       int            not null,
    survey_participant  int            not null,

    primary key(survey_id),

    foreign key(survey_author) references users(user_id),
    foreign key(survey_participant) references users(user_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE chapters
  (
    chapter_id           int            unique not null,
    chapter_name         varchar(256)   not null,
    chapter_description  varchar(256),
    survey_id            int            not null,

    primary key(chapter_id),

    foreign key(survey_id) references surveys(survey_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE questions
  (
    question_id    int            unique not null,
    question_name  varchar(256)   not null,
    question_help  varchar(256),
    chapter_id     int            not null,

    primary key(question_id),

    foreign key(chapter_id) references chapters(chapter_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE answertypes
  (
    answertype_id    int            unique not null,
    answertype_name  varchar(256)   unique not null,

    primary key(answertype_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE answers
  (
    answer_id      int            unique not null,
    answer_name    varchar(256)   not null,
    answer_value   int,
    question_id    int            not null,
    answertype_id  int            not null,

    primary key(answer_id),

    foreign key(question_id) references questions(question_id),
    foreign key(answertype_id) references answertypes(answertype_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE reports
  (
    report_id     int            unique not null,
    report_value  varchar(256)   not null,
    answer_id     int            not null,

    primary key(report_id),

    foreign key(answer_id) references answers(answer_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE survey_question_answer
  (
    survey_question_answer_id  int   unique not null,
    survey_id                  int   not null,
    question_id                int   not null,
    answer_id                  int   not null,

    primary key(survey_question_answer_id),

    foreign key(survey_id) references surveys(survey_id),
    foreign key(question_id) references questions(question_id),
    foreign key(answer_id) references answers(answer_id)
  )
 ENGINE = InnoDB;

-- ======================================================================

