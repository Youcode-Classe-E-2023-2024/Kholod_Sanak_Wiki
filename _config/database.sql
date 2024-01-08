create table User
(
    user_id  bigint auto_increment primary key,
    email    varchar(255) not null,
    password text not null,
    username varchar(255) null,
    picture  text null,
    role ENUM('admin','auteur') not null,
    constraint user_email_uindex unique (email),
    constraint user_id_uindex unique (user_id)
);

create table Wiki
(
    wiki_id bigint auto_increment primary key,
    title varchar(255) not null,
    description varchar(500) not null,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP null,
    status   ENUM('published','archived') not null,
    wiki_picture text NOT NULL,
    creator_id BIGINT ,
    FOREIGN KEY (creator_id) REFERENCES User (user_id) ON UPDATE CASCADE ON DELETE CASCADE,
    cat_id BIGINT ,
    FOREIGN KEY (cat_id) REFERENCES Category (category_id)  ON UPDATE CASCADE ON DELETE CASCADE
);

create table Tag
(
    tag_id bigint auto_increment primary key,
    tag varchar(255) not null,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP null

);

create table Wiki_Tag
(
    tag_id bigint,
    category_id bigint,
    foreign key (tag_id) REFERENCES Tag (tag_id)  ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (category_id) REFERENCES Category (category_id)  ON UPDATE CASCADE ON DELETE CASCADE
);

create table Category
(
    category_id bigint auto_increment primary key,
    category varchar(255) not null,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP null
);
