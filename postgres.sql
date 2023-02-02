--
--  Status Status
--
CREATE TYPE appstatus AS ENUM ('pending', 'activated', 'deactivated', 'suspended', 'blacklisted', 'deleted');

CREATE TABLE IF NOT EXISTS users
(
    id SERIAL PRIMARY KEY,
    type TEXT NULL DEFAULT NULL,
    role_id INTEGER NULL DEFAULT NULL,
    is_admin BOOLEAN NOT NULL DEFAULT FALSE,
    is_volunteer BOOLEAN NOT NULL DEFAULT FALSE,
    is_sponsor BOOLEAN NOT NULL DEFAULT FALSE,
    is_vendor BOOLEAN NOT NULL DEFAULT FALSE,
    firstname text NOT NULL,
    lastname text NOT NULL,
    username text NOT NULL UNIQUE,
    password text NULL DEFAULT NULL,
    gender text NULL DEFAULT NULL,
    dob date NULL DEFAULT NULL,
    email text NOT NULL UNIQUE,
    mobile numeric NULL DEFAULT NULL,
    photo text NULL DEFAULT NULL,
    address text NULL DEFAULT NULL,
    city text NULL DEFAULT NULL,
    bvn numeric NULL DEFAULT NULL,
    nin numeric NULL DEFAULT NULL,
    company_name text NULL DEFAULT NULL,
    company_rc text NULL DEFAULT NULL,
    company_address text NULL DEFAULT NULL,
    position text NULL DEFAULT NULL,
    company_verification boolean NOT NULL DEFAULT false,
    bank text NULL DEFAULT NULL,
    account_name text NULL DEFAULT NULL,
    account_number numeric NULL DEFAULT NULL,
    is_account_completed boolean NOT NULL DEFAULT false,
    status appstatus NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

insert into users (type, role_id, is_admin, firstname, lastname, username, password, email, is_account_completed, status)
            VALUES ( 'admin', 1, true, 'Admin', 'User', 'admin12345', '$2y$10$86PfX0UzOu2mDujs1qn7lOc.tVFUMhzJ16GpoKYazOY1dRMvNtJG.', 'info@greentugboat.org', true, 'activated');

CREATE OR REPLACE FUNCTION update_modified_column()
    RETURNS TRIGGER AS $$
    BEGIN
        NEW.updated_at = now();
        RETURN NEW;
    END;
CREATE LANGUAGE plpgsql;

CREATE TRIGGER update_customer_modtime BEFORE UPDATE ON users FOR EACH ROW EXECUTE PROCEDURE  update_modified_column();


CREATE TABLE IF NOT EXISTS roles (
    id SERIAL PRIMARY KEY,
    name text NOT NULL,
    type text NOT NULL,
    perms text NOT NULL DEFAULT '[null]',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO roles (name, type) VALUES
                                ('Super admin', 'admin'),
                                ('Admin ', 'team'),
                                ('Coordinator', 'team'),
                                ('Coordinator', 'team'),
                                ('Supervisor', 'team'),
                                ('Publisher', 'team'),
                                ('Editor', 'team'),
                                ('User', 'user');

CREATE TRIGGER update_customer_modtime BEFORE UPDATE ON roles FOR EACH ROW EXECUTE PROCEDURE  update_modified_column();

CREATE TABLE IF NOT EXISTS categories (
    id SERIAL PRIMARY KEY,
    name text NOT NULL,
    parentid INT NULL DEFAULT NULL,
    slug text NOT NULL ,
    type text NOT NULL DEFAULT 'projects',
    description text NULL DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO categories (name, type, slug) VALUES
                                ('GTI Portal', 'projects', 'gti-portal'),
                                ('GTI Awareness ', 'projects', 'gti-awareness'),
                                ('TPA Online Campaign', 'projects', 'tpa-online-campaign');



CREATE TRIGGER update_customer_modtime BEFORE UPDATE ON categories FOR EACH ROW EXECUTE PROCEDURE  update_modified_column();


CREATE TYPE poststatus AS ENUM ('draft', 'publish');

CREATE TABLE IF NOT EXISTS posts (
    id SERIAL PRIMARY KEY,
    title text NOT NULL,
    slug text NOT NULL,
    author INT NOT NULL,
    content text NULL DEFAULT NULL,
    content_filtered text NULL DEFAULT NULL,
    featureimage text NULL DEFAULT NULL,
    categoryid text NOT NULL,
    tags text NOT NULL,
    status poststatus NOT NULL DEFAULT 'draft',
    views int NOT NULL DEFAULT 0,
    likes int NOT NULL DEFAULT 0,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TYPE eventstatus AS ENUM ('draft', 'publish');


CREATE TABLE IF NOT EXISTS events (
    id SERIAL PRIMARY KEY,
    title text NOT NULL,
    slug text NOT NULL,
    author INT NOT NULL,
    content text NULL DEFAULT NULL,
    content_filtered text NULL DEFAULT NULL,
    featureimage text NULL DEFAULT NULL,
    status eventstatus NOT NULL DEFAULT 'draft',
    venue text NOT NULL,
    startdate TIMESTAMP NOT NULL,
    enddate TIMESTAMP NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE IF NOT EXISTS tags(
    id SERIAL PRIMARY KEY,
    name text NOT NULL,
    slug text NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TRIGGER update_customer_modtime BEFORE UPDATE ON tags FOR EACH ROW EXECUTE PROCEDURE  update_modified_column();


INSERT INTO tags (name, slug) VALUES ('NGO', 'ngo'),
                                ('Education', 'education'),
                                ('Lifestyle', 'lifestyle'),
                                ('Sport','sport');



CREATE TYPE project_status AS ENUM ('scheduled','completed', 'active', 'inactive', 'suspended', 'ended', 'deleted');

CREATE TABLE projects (
    id SERIAL PRIMARY KEY,
    title text NOT NULL,
    slug text NOT NULL,
    author int NOT NULL,
    category_id int NOT NULL,
    start_date DATE NOT NULL,
    deadline DATE NOT NULL,
    story text NOT NULL,
    budget FLOAT NOT NULL DEFAULT 0.00,
    raised FLOAT NOT NULL DEFAULT 0.00,
    images TEXT NOT NULL,
    featureimage text NOT NULL,
    content_filtered text NOT NULL,
    vendor_id int NULL DEFAULT NULL,
    volunteer_id int NULL DEFAULT NULL,
    sponsor_id int NULL DEFAULT NULL,
    supervisor_id int NULL DEFAULT NULL,
    status project_status NOT NULL DEFAULT 'active',
    review text NULL DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);


CREATE TRIGGER update_customer_modtime BEFORE UPDATE ON projects FOR EACH ROW EXECUTE PROCEDURE  update_modified_column();


CREATE TYPE donationstatus AS ENUM ( 'pending', 'active', 'declined', 'deleted');

CREATE TABLE IF NOT EXISTS donations (
    id SERIAL PRIMARY KEY,
    project_id int NOT NULL,
    user_id int NOT NULL,
    amount FLOAT NOT NULL DEFAULT 0.00,
    image TEXT NOT NULL,
    status donationstatus NOT NULL DEFAULT 'pending',
    description text NULL DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TRIGGER update_customer_modtime BEFORE UPDATE ON donations FOR EACH ROW EXECUTE PROCEDURE  update_modified_column();


CREATE TYPE applicationstatus AS ENUM ('pending', 'active', 'declined', 'deleted');

CREATE TABLE IF NOT EXISTS project_applications (
    id SERIAL PRIMARY KEY,
    project_id int NOT NULL,
    user_id int NOT NULL,
    type text NOT NULL,
    status applicationstatus NOT NULL DEFAULT 'pending',
    description text NULL DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TRIGGER update_customer_modtime BEFORE UPDATE ON project_applications FOR EACH ROW EXECUTE PROCEDURE  update_modified_column();


CREATE TABLE IF NOT EXISTS pages(
    id SERIAL PRIMARY KEY,
    page Text NOT NULL,
    section text NOT NULL,
    type text NOT NULL,
    title text NULL DEFAULT NULL,
    name text NULL DEFAULT NULL,
    content text NULL DEFAULT NULL,
    icon text NULL DEFAULT NULL,
    image text NULL DEFAULT NULL,
    email text NULL DEFAULT NULL,
    phone text NULL DEFAULT NULL,
    address text NULL DEFAULT NULL,
    facebook text NULL DEFAULT NULL,
    twitter text NULL DEFAULT NULL,
    instagram text NULL DEFAULT NULL,
    linkedin text NULL DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO pages (page, section, type, content, image) VALUES
                                                ('home', 'banner', 'text1', 'CALL TO', null),
                                                ('home', 'banner', 'text2', 'ACTIVE CITIZENSHIP', null),
                                                ('home', 'banner', 'text3', 'We break down civic duties and innovative strategies into simple steps for everyone to take and enjoin all citizens to play their constitutional roles.',null),
                                                ('home', 'banner', 'text4', 'join the journey', null),
                                                ('home', 'banner', 'text5', 'Join more than 20,000,000+ People taking back Nigeria', null),
                                                ('home', 'banner', 'image1', null, null),


                                                ('home', 'banner', 'thumbnail1', null, null),
                                                ('home', 'banner', 'thumbnail2', null, null),
                                                ('home', 'banner', 'thumbnail3', null, null),
                                                ('home', 'banner', 'thumbnail4', null, null),
                                                ('home', 'banner', 'thumbnail5', null, null),
                                                ('home', 'banner', 'thumbnail6', null, null),
                                                ('home', 'banner', 'thumbnail7', null, null);



INSERT INTO pages (page, section, type, content, image) VALUES
                                                            ('home', 'join-us', 'text1', 'They are wait for your Help', null),
                                                            ('home', 'join-us', 'text2', 'The Charnyy Global aid network envisions a thriving and connected community, one in which all of its members have dependable access to resources that enrich and empower lives.The Charnyy Global aid network envisions a thriving and connected community, one in which all of its members have dependable access to resources that enrich and empower lives.', null),
                                                            ('home', 'join-us', 'text3', 'Donate', null),
                                                            ('home', 'join-us', 'image', null, null);

INSERT INTO pages (page, section, type, content, image) VALUES
                                                            ('home', 'about-foundation', 'text1', 'what have we done withyour help', null),
                                                            ('home', 'about-foundation', 'text2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage Lorem of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle There are many variations of passages', null),
                                                            ('home', 'about-foundation', 'text3', 'join our Action and everyone can help', null),
                                                            ('home', 'about-foundation', 'text4', 'Donate NOW', null),
                                                            ('home', 'about-foundation', 'text5', 'Become a Volenteer', null),
                                                            ('home', 'about-foundation', 'text6', 'Become a Volenteer', null),
                                                            ('home', 'about-foundation', 'url1', 'Become a Volenteer', null),
                                                            ('home', 'about-foundation', 'url2', 'Become a Volenteer', null),
                                                            ('home', 'about-foundation', 'url3', 'Become a Volenteer', null),
                                                            ('home', 'about-foundation', 'image', null, null);


INSERT INTO pages (page, section, type, title, content) VALUES
                                                            ('about', 'foundation', 'content', 'THE ORIGINAL THOUGHT', 'Socio-economic ');

INSERT INTO pages (page, section, type, content, image) VALUES
                                                            ('about', 'aims-objectives', 'content', 'Our primary objective is to carry out public orientation, education and mobilisation projects around policy provisions and proposals in order to increase public participation and promote socio economic advancement in the society.', null);

INSERT INTO pages (page, section, type, content, image) VALUES
                                                            ('about', 'mission', 'content', 'Our primary objective is to carry out public orientation, education and mobilisation projects around policy provisions and proposals in order to increase public participation and promote socio economic advancement in the society.', null);

INSERT INTO pages (page, section, type, content, image) VALUES
                                                            ('about', 'vision', 'content', 'Our primary objective is to carry out public orientation, education and mobilisation projects around policy provisions and proposals in order to increase public participation and promote socio economic advancement in the society.', null);

INSERT INTO pages (page, section, type, content, image) VALUES
                                                            ('about', 'core-value', 'content', 'Our primary objective is to carry out public orientation, education and mobilisation projects around policy provisions and proposals in order to increase public participation and promote socio economic advancement in the society.', null);

INSERT INTO pages (page, section, type, content, image) VALUES
                                                            ('about', 'stratergy-methods', 'content', 'Our primary objective is to carry out public orientation, education and mobilisation projects around policy provisions and proposals in order to increase public participation and promote socio economic advancement in the society.', null);

INSERT INTO pages (page, section, type, content) VALUES
                                                            ('terms', 'terms', 'terms', 'Content here');

INSERT INTO pages (page, section, type, content) VALUES
                                                            ('privacy', 'privacy', 'privacy', 'Content here');

CREATE TRIGGER update_customer_modtime BEFORE UPDATE ON pages FOR EACH ROW EXECUTE PROCEDURE  update_modified_column();


CREATE TABLE IF NOT EXISTS comments(
    id SERIAL PRIMARY KEY,
    postid text NOT NULL,
    parentid text NULL DEFAULT NULL,
    author text NULL DEFAULT NULL,
    name text null default null,
    email text null default null,
    phone text null DEfault null,
    message text null default null,
    subject TEXT null default null,
    picture text NULL DEFAULT null,
    type text null default null,
    status text not null default 'approve',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TRIGGER update_customer_modtime BEFORE UPDATE ON comments FOR EACH ROW EXECUTE PROCEDURE  update_modified_column();



CREATE TABLE IF NOT EXISTS socialshare(
    id SERIAL PRIMARY KEY,
    postid int not null,
    socialid TEXT not null,
    parentid text NULL DEFAULT NULL,
    link text null default null,
    body text not null,
    type text not null,
    userid text null default null,
    name text null default null,
    picture text null default null,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TRIGGER update_customer_modtime BEFORE UPDATE ON socialshare FOR EACH ROW EXECUTE PROCEDURE  update_modified_column();


CREATE TABLE password_resets (
      id SERIAL PRIMARY KEY,
  email text NOT NULL,
  token text NOT NULL,
     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
