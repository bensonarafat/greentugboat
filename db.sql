CREATE TABLE if not exists categories (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    parentid int(11) NULL DEFAULT NULL,
    slug varchar(255) NOT NULL,
    type varchar(255) NOT NULL DEFAULT 'projects',
    is_pinned tinyint(1) NOT NULL DEFAULT 0,
    description varchar(255) NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE if not exists project_activities (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    projectid int(11) NOT NULL,
    userid int(11) NULL DEFAULT NULL,
    secondary_userid int(11) NULL DEFAULT NULL,
    description text  NULL DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



CREATE TABLE if not exists comments (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    postid int(11) NOT NULL,
    parentid int(11) NULL DEFAULT NULL,
    author int(11) NULL DEFAULT NULL,
    name varchar(255) NULL DEFAULT NULL,
    email varchar(255) NULL DEFAULT NULL,
    phone varchar(255) NULL DEFAULT NULL,
    message text  NULL DEFAULT NULL,
    subject varchar(255) NULL DEFAULT NULL,
    picture varchar(255) NULL DEFAULT NULL,
    type varchar(255) NULL DEFAULT NULL,
    status varchar(255) NOT NULL default 'approve',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE donations (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    project_id int(11) NOT NULL,
    user_id int(11) NOT NULL,
    amount decimal(25,2) NOT NULL DEFAULT 0.00,
    image varchar(255) NOT NULL,
    status enum("prepending", "pending", "active", "declined", "deleted") NOT NULL DEFAULT 'pending',
    description text  NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE events (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    slug varchar(255) NOT NULL,
    author int(11) NOT NULL,
    content text NULL DEFAULT NULL,
    content_filtered text NULL DEFAULT NULL,
    featureimage varchar(255) NULL DEFAULT NULL,
    status enum("publish", "draft") NOT NULL DEFAULT 'draft',
    venue varchar(255) NOT NULL,
    startdate timestamp  NULL DEFAULT NULL,
    enddate timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE pages (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    page varchar(255) NOT NULL,
    section varchar(255) NOT NULL,
    type varchar(255) NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE password_resets (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email text NOT NULL,
    token text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE posts (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    slug varchar(255) NOT NULL,
    author int(11) NOT NULL,
    content text NULL DEFAULT NULL,
    content_filtered text NULL DEFAULT NULL,
    featureimage varchar(255) NOT NULL,
    categoryid text NOT NULL,
    tags text NOT NULL,
    status enum("publish", "draft") NOT NULL DEFAULT 'draft',
    is_pinned tinyint(1) NOT NULL DEFAULT 0,
    views int(11) NOT NULL DEFAULT 0,
    likes int(11)  NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE project_applications (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    project_id int(11) NOT NULL,
    user_id int(11) NOT NULL,
    type text NOT NULL,
    status enum("pending", "active", "declined", "deleted")  NOT NULL DEFAULT 'pending',
    amount decimal(25,2) NOT NULL DEFAULT 0.00,
    invoice text NULL DEFAULT NULL,
    cv text NULL DEFAULT NULL,
    description text NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE projects (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    slug varchar(255) NOT NULL,
    author int(11) NOT NULL,
    category_id int(11) NOT NULL,
    start_date date NOT NULL,
    deadline date NOT NULL,
    story text NOT NULL,
    budget decimal(25,2) NOT NULL DEFAULT 0.00,
    raised decimal(25,2) NOT NULL DEFAULT 0.00,
    priority enum('1', '2', '3', '4') NOT NULL DEFAULT '1',
    images text NOT NULL,
    featureimage text NOT NULL,
    content_filtered text NOT NULL,
    vendor_id int(11)  NULL DEFAULT NULL,
    volunteer int(11) NOT NULL DEFAULT 0,
    sponsor_id int(11)  NULL DEFAULT NULL,
    supervisor_id int(11)  NULL DEFAULT NULL,
    status enum("pending", "scheduled", "completed", "active", "inactive", "suspended", "ended", "deleted") NOT NULL DEFAULT 'pending',
    review text NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE roles (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    type varchar(255) NOT NULL,
    perms text NOT NULL DEFAULT '[null]',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE socialshare (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    postid int(11) NOT NULL,
    socialid int(11) NOT NULL,
    parentid int(11) NULL DEFAULT NULL,
    link varchar(255) NULL DEFAULT NULL,
    body text NOT NULL,
    type text NOT NULL,
    userid int(11) NULL DEFAULT NULL,
    name varchar(255) NULL DEFAULT NULL,
    picture varChar(255) NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE tags (
   id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name text NOT NULL,
    slug text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



CREATE TABLE users (
   id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type varchar(255) null DEFAULT NULL,
    role_id int(11) null DEFAULT NULL,
    is_admin tinyint(1) NOT NULL DEFAULT 0 ,
    is_volunteer tinyint(1) NOT NULL DEFAULT 0 ,
    is_sponsor tinyint(1) NOT NULL DEFAULT 0 ,
    is_vendor tinyint(1) NOT NULL DEFAULT 0 ,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    -- username varchar(255) NOT NULL UNIQUE,
    password varchar(255) NOT NULL,
    gender varchar(255)  NULL DEFAULT NULL,
    dob date NULL DEFAULT NULL,
    email varchar(255) NOT NULL UNIQUE,
    mobile varchar(255) NULL DEFAULT NULL,
    photo varchar(255) NULL DEFAULT NULL,
    address varchar(255) NULL DEFAULT NULL,
    city varchar(255) NULL DEFAULT NULL,
    bvn varchar(255)  NULL DEFAULT NULL ,
    nin varchar(255)  NULL DEFAULT NULL ,
    company_name varchar(255) NULL DEFAULT NULL,
    company_rc varchar(255) NULL DEFAULT NULL,
    company_address varchar(255) NULL DEFAULT NULL,
    position varchar(255) NULL DEFAULT NULL,
    company_verification tinyint(1) NOT NULL DEFAULT 0 ,
    bank varchar(255) NULL DEFAULT NULL,
    account_name varchar(255) NULL DEFAULT NULL,
    account_number varChar(255)  NULL DEFAULT NULL,
    is_account_completed tinyint(1) NOT NULL DEFAULT 0 ,
    status varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO categories VALUES (1, 'GTI Portal', NULL, 'gti-portal', 'projects', NULL, '2022-07-11 08:40:58.010887', '2022-07-11 08:40:58.010887');
INSERT INTO categories VALUES (2, 'GTI Awareness ', NULL, 'gti-awareness', 'projects', NULL, '2022-07-11 08:40:58.010887', '2022-07-11 08:40:58.010887');
INSERT INTO categories VALUES (3, 'TPA Online Campaign', NULL, 'tpa-online-campaign', 'projects', NULL, '2022-07-11 08:40:58.010887', '2022-07-11 08:40:58.010887');
INSERT INTO categories VALUES (4, 'Health', NULL, 'health', 'blog', NULL, '2022-07-11 21:54:13', '2022-07-11 21:54:13');
INSERT INTO categories VALUES (5, 'Education', NULL, 'education', 'blog', NULL, '2022-07-11 21:54:29', '2022-07-11 21:54:29');
INSERT INTO categories VALUES (7, 'GTI', NULL, 'gti', 'project', NULL, '2022-07-19 12:59:08', '2022-07-19 12:59:08');
INSERT INTO categories VALUES (8, 'GTI child', 7, 'gti-child', 'project', NULL, '2022-07-19 12:59:21', '2022-07-19 12:59:21');
INSERT INTO categories VALUES (9, 'GTI Portal', NULL, 'gti-portal', 'project', 'Website and portal engine, and all else related', '2022-07-20 10:13:26', '2022-07-20 10:13:26');
INSERT INTO categories VALUES (10, 'GTI Awareness', NULL, 'gti-awareness', 'project', 'Campaigns and promotions', '2022-07-20 10:14:42', '2022-07-20 10:14:42');
INSERT INTO categories VALUES (11, 'TPA Online Campaign', NULL, 'tpa-online campaign', 'project', 'Online promotion for TPA', '2022-07-20 10:16:42', '2022-07-20 10:16:42');
INSERT INTO categories VALUES (6, 'TPA', NULL, 'tpa', 'blog', NULL, '2022-07-11 21:55:32', '2022-08-17 13:50:20');
INSERT INTO categories VALUES (12, 'Security', 6, 'security', 'blog', 'Matters concerning protection of lives and property', '2022-07-20 10:16:55', '2022-08-17 13:50:34');
INSERT INTO categories VALUES (13, 'Culture', 6, 'culture', 'blog', 'Ethnic and religious concerns', '2022-08-17 13:51:28', '2022-08-17 13:51:28');
INSERT INTO categories VALUES (14, 'Religion', NULL, 'religion', 'blog', 'Matters of religion and faith', '2022-08-17 13:54:08', '2022-08-17 13:54:08');
INSERT INTO categories VALUES (15, 'ECONOMY', NULL, 'economy', 'blog', NULL, '2022-09-01 09:36:26', '2022-09-01 09:36:26');
INSERT INTO categories VALUES (16, 'POLTICS', NULL, 'poltics', 'blog', NULL, '2022-09-13 08:31:07', '2022-09-13 08:31:07');



INSERT INTO comments VALUES (1, '2', NULL, '946760742908452864', 'Ben', NULL, NULL, '@TheGreenTugboat This should update on the server', 'Twitter', 'https://pbs.twimg.com/profile_images/1530975158881636354/KyZfKVxu_normal.jpg', 'twitter', 'approve', '2022-08-17 12:39:16', '2022-08-17 12:39:16');
INSERT INTO comments VALUES (2, '2', NULL, '946760742908452864', 'Ben', NULL, NULL, '@TheGreenTugboat Comment here', 'Twitter', 'https://pbs.twimg.com/profile_images/1530975158881636354/KyZfKVxu_normal.jpg', 'twitter', 'approve', '2022-08-17 12:39:17', '2022-08-17 12:39:17');
INSERT INTO comments VALUES (3, '2', NULL, '1523643984534454272', 'Green Tugboat', NULL, NULL, 'Comment here', 'Twitter', 'https://pbs.twimg.com/profile_images/1523644260825939969/KHsF06pv_normal.jpg', 'twitter', 'approve', '2022-08-17 12:39:18', '2022-08-17 12:39:18');
INSERT INTO comments VALUES (4, '7', NULL, NULL, 'Golden', 'agnessinyang5@gmail.com', NULL, 'I love this,it will help Nigerians a lot.', NULL, NULL, NULL, 'approve', '2022-09-06 21:23:05', '2022-09-06 21:23:05');


INSERT INTO donations VALUES (1, 1, 2, 2000, 'uploads/donations/1047138633-1658237034.jpg', 'active', NULL, '2022-07-19 13:23:54', '2022-07-19 13:34:46');
INSERT INTO donations VALUES (2, 2, 1, 100000, 'images/system/donations/default.png', 'active', NULL, '2022-07-20 22:07:52', '2022-07-20 22:07:52');
INSERT INTO donations VALUES (4, 3, 1, 100000, 'images/system/donations/default.png', 'active', NULL, '2022-07-21 10:22:14', '2022-08-16 09:48:20');
INSERT INTO donations VALUES (3, 4, 1, 300000, 'images/system/donations/default.png', 'active', NULL, '2022-07-21 10:19:24', '2022-08-16 09:48:32');



INSERT INTO pages VALUES (32, 'home', 'testimonial', 'slide', 'Entrepreneur & Business Coach. www.imalsilva.com', 'Imal Emmanuel Silva', '“A commendable initiative to drive citizen engagement and citizen driven development. One step at a time.”', 'uploads/pages/967862692-1662890010.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 21:32:37', '2022-09-11 09:53:30');
INSERT INTO pages VALUES (13, 'home', 'about-foundation', 'text2', NULL, NULL, 'As is said that little drops of water make the mighty ocean, we intend to reach the ends of our world, one person and one small group at a time. The whole magic is simplified into tiny actionable projects that you and I can do or sponsor others to do. The more you do, the much more others join in to do, and the spread promises to astound us all. So don''t wait any longer! Start sharing and posting, sponsor street campaigns and rural outreaches. The Nigerian miracle is literally at your fingertips. Yours and mine.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-08-18 09:16:13');
INSERT INTO pages VALUES (16, 'home', 'about-foundation', 'text5', NULL, NULL, 'Become a Volunteer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-08-18 09:16:13');
INSERT INTO pages VALUES (10, 'home', 'join-us', 'text3', NULL, NULL, 'Join Now', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-01 02:59:45');
INSERT INTO pages VALUES (15, 'home', 'about-foundation', 'text4', NULL, NULL, 'Donate now', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-08-18 09:16:13');
INSERT INTO pages VALUES (3, 'home', 'banner', 'text3', NULL, NULL, 'We break down civic duties and innovative strategies into simple steps for everyone to take and enjoin all citizens to play their constitutional roles.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-11 06:55:04');
INSERT INTO pages VALUES (4, 'home', 'banner', 'text4', NULL, NULL, 'join the journey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-11 06:55:04');
INSERT INTO pages VALUES (27, 'home', 'support-partner', 'slide', 'Bemo Technologies Ltd', NULL, 'Bemo Technologies Ltd, Abuja Nigeria', 'uploads/pages/1009009951-1662885739.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 21:16:44', '2022-09-11 08:43:23');
INSERT INTO pages VALUES (28, 'home', 'support-partner', 'slide', 'LightRay Media', NULL, 'LightRay Media. www.lightraymedia.org', 'uploads/pages/1237318115-1662888165.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 21:17:21', '2022-09-11 09:22:45');
INSERT INTO pages VALUES (6, 'home', 'banner', 'image1', NULL, NULL, NULL, NULL, 'uploads/pages/1047039652-1662879540.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-11 07:08:17');
INSERT INTO pages VALUES (20, 'about', 'mission', 'content', NULL, NULL, '<p>To promote a strong sense of national consciousness, purpose and duty in every citizen.</p>', 'uploads/pages/562926190-1663063091.jpg', 'uploads/pages/209578312-1663063091.jpg', 'uploads/pages/1236499653-1663063091.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-13 09:58:11');
INSERT INTO pages VALUES (24, 'home', 'game-plan', 'slide', 'Engage the nation to develop TPA', NULL, 'Stir a nationwide debate on social media and everywhere on the streets, coordinating the deliberate compilation of The People''s Agenda.', 'uploads/pages/1570500024-1657574046.svg', '1', NULL, NULL, 'www.greentugboat.org/', NULL, NULL, NULL, NULL, '2022-07-11 21:14:06', '2022-09-20 17:06:51');
INSERT INTO pages VALUES (1, 'home', 'banner', 'text1', NULL, NULL, 'CALL TO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-11 06:55:04');
INSERT INTO pages VALUES (11, 'home', 'join-us', 'image', NULL, NULL, NULL, NULL, 'uploads/pages/705465077-1662001185.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-01 02:59:45');
INSERT INTO pages VALUES (17, 'home', 'about-foundation', 'image', NULL, NULL, NULL, NULL, 'uploads/pages/829337102-1660814173.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-08-18 09:16:13');
INSERT INTO pages VALUES (31, 'home', 'testimonial', 'slide', 'Lecturer, MLS, Jos', 'Agnes Inyang', '“I sincerely love this! It will really help Nigerians a lot. I want to thank you for your good work.”', 'uploads/pages/60525341-1662890023.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 21:32:08', '2022-09-11 10:24:16');
INSERT INTO pages VALUES (18, 'about', 'foundation', 'content', 'THE ORIGINAL THOUGHT', NULL, '<p class="aboutDetailsText mb-20">Socio-economic advancement of a society requires very effective governance, which is a complex synergy of legislation and execution at several levels of government. It goes well beyond the competence and qualities of a single leader or isolated &lsquo;messiahs&rsquo;.</p>
<p class="aboutDetailsText mb-20">To get it right, the goal has to be producing a whole set of leaders at almost all levels and tiers of government that share a clearly outlined set of agreed ideals, objectives, methods and agenda.</p>
<p class="aboutDetailsText mb-20">This agenda in view evidently cannot be left to the whims of politicians who are driven majorly by personal and clique ambition, and it certainly won&rsquo;t be happening by chance. It will require the highest level of deliberateness and determination to achieve.</p>
<p class="aboutDetailsText mb-20">It also has to come from the people, be designed for the people and by the people. Then the people will be able to select those leaders who are proven to understand the people&rsquo;s agenda, and are proven to commit totally to the speedy and complete achievement of The People&rsquo;s Agenda.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-07-11 21:34:17');
INSERT INTO pages VALUES (26, 'home', 'game-plan', 'slide', 'Publish a demo TPA', NULL, 'Publish demo TPA to give the people an idea of what they have to evolve in the shortest time possible', 'uploads/pages/1832112766-1657574148.svg', NULL, NULL, NULL, 'www.greentugboat.org/', NULL, NULL, NULL, NULL, '2022-07-11 21:15:48', '2022-09-20 09:25:41');
INSERT INTO pages VALUES (23, 'about', 'stratergy-methods', 'content', NULL, NULL, '<p>Our primary objective is to carry out public orientation, education and mobilisation projects around policy provisions and proposals in order to increase public participation and promote socio economic advancement in the society.</p>', 'uploads/pages/1304149934-1663063606.jpg', 'uploads/pages/1999406681-1663063606.jpg', 'uploads/pages/1978491781-1663063606.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-13 10:06:46');
INSERT INTO pages VALUES (21, 'about', 'vision', 'content', NULL, NULL, '<p>To inspire a nation with collective consciousness, clarity, and purpose</p>', 'uploads/pages/2087026942-1663062918.jpg', 'uploads/pages/188694189-1663062918.jpg', 'uploads/pages/1804026386-1663062918.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-13 09:55:18');
INSERT INTO pages VALUES (22, 'about', 'core-value', 'content', NULL, NULL, '<p>Our primary objective is to carry out public orientation, education and mobilisation projects around policy provisions and proposals in order to increase public participation and promote socio economic advancement in the society.</p>', 'uploads/pages/592442585-1663063757.jpg', 'uploads/pages/365324113-1663063757.jpg', 'uploads/pages/22894828-1663063757.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-13 10:09:17');
INSERT INTO pages VALUES (8, 'home', 'join-us', 'text1', NULL, NULL, 'WE ARE ALL IN THIS TOGETHER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-01 02:59:45');
INSERT INTO pages VALUES (12, 'home', 'about-foundation', 'text1', NULL, NULL, 'How do we plan to achieve so much?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-08-18 09:16:13');
INSERT INTO pages VALUES (14, 'home', 'about-foundation', 'text3', NULL, NULL, 'Join the Action, and everyone can help too.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-08-18 09:16:13');
INSERT INTO pages VALUES (2, 'home', 'banner', 'text2', NULL, NULL, 'ACTIVE CITIZENSHIP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-11 06:55:04');
INSERT INTO pages VALUES (5, 'home', 'banner', 'text5', NULL, NULL, 'Join more than 20,000,000+ People taking back Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-11 06:55:04');
INSERT INTO pages VALUES (7, 'home', 'banner', 'thumbnail1', NULL, NULL, NULL, NULL, 'uploads/pages/343357950-1662880097.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-11 07:08:17');
INSERT INTO pages VALUES (57, 'home', 'banner', 'thumbnail6', NULL, NULL, NULL, NULL, 'uploads/pages/1194905934-1662880097.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 16:48:31.133791', '2022-09-11 07:08:17');
INSERT INTO pages VALUES (39, 'home', 'need-your-help', 'slide', 'SHARE AND PROPAGATE', NULL, 'Keep your circle of contacts fully aware and up-to-date with our activities.', 'uploads/pages/1062744025-1658233889.svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-19 12:31:29', '2022-07-19 12:31:29');
INSERT INTO pages VALUES (40, 'home', 'need-your-help', 'slide', 'PICK PROJECTS TO FUND', NULL, 'We keep adding tons of projects for you to select from and fully or partly finance.', 'uploads/pages/1740010587-1658235800.svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-19 13:03:20', '2022-07-19 13:03:20');
INSERT INTO pages VALUES (41, 'home', 'need-your-help', 'slide', 'VOLUNTEER FOR CAUSES', NULL, 'Join the boots on ground around you making the dream come true.', 'uploads/pages/200209864-1658236028.svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-19 13:07:08', '2022-07-19 13:07:08');
INSERT INTO pages VALUES (58, 'home', 'banner', 'thumbnail7', NULL, NULL, NULL, NULL, 'uploads/pages/2005962099-1662325125.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 16:51:09.014663', '2022-09-11 07:08:17');
INSERT INTO pages VALUES (33, 'about', 'volunteers', 'slide', NULL, 'Segun Akindele', NULL, 'uploads/pages/1160902661-1662121566.jpeg', NULL, NULL, NULL, NULL, 'https://www.facebook.com/segzifd/', 'https://twitter.com/shegn', 'https://www.instagram.com/segzifd/', NULL, '2022-07-11 21:44:30', '2022-09-02 12:26:06');
INSERT INTO pages VALUES (68, 'home', 'testimonial', 'slide', 'MNIA, MAARCHES, MCIPPN', 'Oluyemi Ebenezer Oke', 'Bravo! Keep up the good work. This is a timely awakening, making citizens, especially the youths to understand their civic duties and constitution responsibilities to  nation building.', 'uploads/pages/18072080-1662892742.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-11 10:39:02', '2022-09-11 10:39:02');
INSERT INTO pages VALUES (52, 'home', 'banner', 'thumbnail2', NULL, NULL, NULL, NULL, 'uploads/pages/873889262-1662880097.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 16:40:30.416233', '2022-09-11 07:08:17');
INSERT INTO pages VALUES (34, 'about', 'volunteers', 'slide', NULL, 'FAVOUR JACOBS', NULL, 'uploads/pages/1429456234-1662122840.png', NULL, NULL, NULL, NULL, 'https://web.facebook.com/profile.php?id=100004303816473', 'https://twitter.com/nemere_chi', NULL, NULL, '2022-07-11 21:44:47', '2022-09-02 12:47:20');
INSERT INTO pages VALUES (50, 'about', 'volunteers', 'slide', NULL, 'Ben Arafat', NULL, 'uploads/pages/1515087035-1662123430.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-02 12:57:10', '2022-09-02 12:57:10');
INSERT INTO pages VALUES (51, 'about', 'volunteers', 'slide', NULL, 'Seun Ajayi', NULL, 'uploads/pages/1050743023-1662123797.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-02 13:03:17', '2022-09-02 13:03:17');
INSERT INTO pages VALUES (42, 'home', 'about-foundation', 'text6', '', '', 'Bid for jobs', '', '', '', '', '', '', '', '', '', '2022-07-20 18:03:58.925825', '2022-08-18 09:16:13');
INSERT INTO pages VALUES (43, 'home', 'about-foundation', 'url1', '', '', 'http://greentugboat.org/projects', '', '', '', '', '', '', '', '', '', '2022-07-20 18:05:16.454233', '2022-08-18 09:16:13');
INSERT INTO pages VALUES (44, 'home', 'about-foundation', 'url2', '', '', 'http://greentugboat.org/projects', '', '', '', '', '', '', '', '', '', '2022-07-20 18:05:57.337534', '2022-08-18 09:16:13');
INSERT INTO pages VALUES (45, 'home', 'about-foundation', 'url3', '', '', 'http://greentugboat.org/projects', '', '', '', '', '', '', '', '', '', '2022-07-20 18:06:16.668152', '2022-08-18 09:16:13');
INSERT INTO pages VALUES (38, 'contact', 'contact', 'contact', 'Abuja', NULL, NULL, NULL, NULL, 'info@greentugboat.org', '+2349066022301', 'A30, BCEP2, Abuja', NULL, NULL, NULL, NULL, '2022-07-11 21:53:35', '2022-08-19 13:18:03');
INSERT INTO pages VALUES (9, 'home', 'join-us', 'text2', NULL, NULL, 'The building of an environment where we all thrive and flourish requires full participation of all. We need to come together with a clear understanding of our individual responsibilities and collective objectives. The very task of getting others to come to this knowledge becomes the responsibility of us who already know. We have the double burden of duty to play our roles and also help all others come to the knowledge as well. Let us get this task going as fast as possible till every one called Nigerian is awake, alert and active in this national development drive.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-01 02:59:45');
INSERT INTO pages VALUES (53, 'home', 'banner', 'thumbnail3', NULL, NULL, NULL, NULL, 'uploads/pages/1184875498-1662880097.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 16:42:42.602323', '2022-09-11 07:08:17');
INSERT INTO pages VALUES (46, 'terms', 'terms', 'terms', NULL, NULL, '<h2><strong>Terms and Conditions</strong></h2>

<p>Welcome to Green Tugboat!</p>

<p>These terms and conditions outline the rules and regulations for the use of Green Tugboat''s Website, located at greentugboat.org.</p>

<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use Green Tugboat if you do not agree to take all of the terms and conditions stated on this page.</p>

<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>

<h3><strong>Cookies</strong></h3>

<p>We employ the use of cookies. By accessing Green Tugboat, you agreed to use cookies in agreement with the Green Tugboat''s Privacy Policy. </p>

<p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>

<h3><strong>License</strong></h3>

<p>Unless otherwise stated, Green Tugboat and/or its licensors own the intellectual property rights for all material on Green Tugboat. All intellectual property rights are reserved. You may access this from Green Tugboat for your own personal use subjected to restrictions set in these terms and conditions.</p>

<p>You must not:</p>
<ul>
    <li>Republish material from Green Tugboat</li>
    <li>Sell, rent or sub-license material from Green Tugboat</li>
    <li>Reproduce, duplicate or copy material from Green Tugboat</li>
    <li>Redistribute content from Green Tugboat</li>
</ul>

<p>This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the <a href="https://www.termsandconditionsgenerator.com/">Free Terms and Conditions Generator</a>.</p>

<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Green Tugboat does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Green Tugboat,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Green Tugboat shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>

<p>Green Tugboat reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>

<p>You warrant and represent that:</p>

<ul>
    <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
    <li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
    <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
    <li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
</ul>

<p>You hereby grant Green Tugboat a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>

<h3><strong>Hyperlinking to our Content</strong></h3>

<p>The following organizations may link to our Website without prior written approval:</p>

<ul>
    <li>Government agencies;</li>
    <li>Search engines;</li>
    <li>News organizations;</li>
    <li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
    <li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
</ul>

<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p>

<p>We may consider and approve other link requests from the following types of organizations:</p>

<ul>
    <li>commonly-known consumer and/or business information sources;</li>
    <li>dot.com community sites;</li>
    <li>associations or other groups representing charities;</li>
    <li>online directory distributors;</li>
    <li>internet portals;</li>
    <li>accounting, law and consulting firms; and</li>
    <li>educational institutions and trade associations.</li>
</ul>

<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Green Tugboat; and (d) the link is in the context of general resource information.</p>

<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.</p>

<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Green Tugboat. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>

<p>Approved organizations may hyperlink to our Website as follows:</p>

<ul>
    <li>By use of our corporate name; or</li>
    <li>By use of the uniform resource locator being linked to; or</li>
    <li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li>
</ul>

<p>No use of Green Tugboat''s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>

<h3><strong>iFrames</strong></h3>

<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>

<h3><strong>Content Liability</strong></h3>

<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>

<h3><strong>Your Privacy</strong></h3>

<p>Please read Privacy Policy</p>

<h3><strong>Reservation of Rights</strong></h3>

<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>

<h3><strong>Removal of links from our website</strong></h3>

<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>

<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>

<h3><strong>Disclaimer</strong></h3>

<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>

<ul>
    <li>limit or exclude our or your liability for death or personal injury;</li>
    <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
    <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
    <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
</ul>

<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>

<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-26 06:50:50.687919', '2022-07-26 06:50:50.687919');
INSERT INTO pages VALUES (47, 'privacy', 'privacy', 'privacy', NULL, NULL, '
<h2 style="text-align: center;"><b>PRIVACY POLICY</b></h2>
<p>Effective date: 2022-07-28</p>
<p>1. <b>Introduction</b></p>
<p>Welcome to <b> Green Tugboat</b>.</p>
<p><b>Green Tugboat</b> (“us”, “we”, or “our”) operates <b>http://greentugboat.org</b> (hereinafter referred to as <b>“Service”</b>).</p>
<p>Our Privacy Policy governs your visit to <b>http://greentugboat.org</b>, and explains how we collect, safeguard and disclose information that results from your use of our Service.</p>
<p>We use your data to provide and improve Service. By using Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, the terms used in this Privacy Policy have the same meanings as in our Terms and Conditions.</p>
<p>Our Terms and Conditions (<b>“Terms”</b>) govern all use of our Service and together with the Privacy Policy constitutes your agreement with us (<b>“agreement”</b>).</p>
<p>2. <b>Definitions</b></p>
<p><b>SERVICE</b> means the http://greentugboat.org website operated by Green Tugboat.</p>
<p><b>PERSONAL DATA</b> means data about a living individual who can be identified from those data (or from those and other information either in our possession or likely to come into our possession).</p>
<p><b>USAGE DATA</b> is data collected automatically either generated by the use of Service or from Service infrastructure itself (for example, the duration of a page visit).</p>
<p><b>COOKIES</b> are small files stored on your device (computer or mobile device).</p>
<p><b>DATA CONTROLLER</b> means a natural or legal person who (either alone or jointly or in common with other persons) determines the purposes for which and the manner in which any personal data are, or are to be, processed. For the purpose of this Privacy Policy, we are a Data Controller of your data.</p>
<p><b>DATA PROCESSORS (OR SERVICE PROVIDERS)</b> means any natural or legal person who processes the data on behalf of the Data Controller. We may use the services of various Service Providers in order to process your data more effectively.</p> <p><b>DATA SUBJECT</b> is any living individual who is the subject of Personal Data.</p>
<p><b>THE USER</b> is the individual using our Service. The User corresponds to the Data Subject, who is the subject of Personal Data.</p>
<p>3. <b>Information Collection and Use</b></p>
<p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>
<p>4. <b>Types of Data Collected</b></p>
<p><b>Personal Data</b></p>
<p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you (<b>“Personal Data”</b>). Personally identifiable information may include, but is not limited to:</p>
<p>0.1. Email address</p>
<p>0.2. First name and last name</p>
<p>0.3. Phone number</p>
<p>0.4. Address, Country, State, Province, ZIP/Postal code, City</p>
<p>0.5. Cookies and Usage Data</p>
<p>We may use your Personal Data to contact you with newsletters, marketing or promotional materials and other information that may be of interest to you. You may opt out of receiving any, or all, of these communications from us by following the unsubscribe link.</p>
<p><b>Usage Data</b></p>
<p>We may also collect information that your browser sends whenever you visit our Service or when you access Service by or through any device (<b>“Usage Data”</b>).</p>
<p>This Usage Data may include information such as your computer’s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>
<p>When you access Service with a device, this Usage Data may include information such as the type of device you use, your device unique ID, the IP address of your device, your device operating system, the type of Internet browser you use, unique device identifiers and other diagnostic data.</p>

<p><b>Tracking Cookies Data</b></p>
<p>We use cookies and similar tracking technologies to track the activity on our Service and we hold certain information.</p>
<p>Cookies are files with a small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Other tracking technologies are also used such as beacons, tags and scripts to collect and track information and to improve and analyze our Service.</p>
<p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>
<p>Examples of Cookies we use:</p>
<p>0.1. <b>Session Cookies:</b> We use Session Cookies to operate our Service.</p>
<p>0.2. <b>Preference Cookies:</b> We use Preference Cookies to remember your preferences and various settings.</p>
<p>0.3. <b>Security Cookies:</b> We use Security Cookies for security purposes.</p>
<p>0.4. <b>Advertising Cookies:</b> Advertising Cookies are used to serve you with advertisements that may be relevant to you and your interests.</p>
<p><b>Other Data</b></p>
<p>While using our Service, we may also collect the following information: sex, age, date of birth, place of birth, passport details, citizenship, registration at place of residence and actual address, telephone number (work, mobile), details of documents on education, qualification, professional training, employment agreements, <a href="https://policymaker.io/non-disclosure-agreement/">NDA agreements</a>, information on bonuses and compensation, information on marital status, family members, social security (or other taxpayer identification) number, office location and other data.</p>
<p>5. <b>Use of Data</b></p>
<p>Green Tugboat uses the collected data for various purposes:</p>
<p>0.1. to provide and maintain our Service;</p>
<p>0.2. to notify you about changes to our Service;</p>
<p>0.3. to allow you to participate in interactive features of our Service when you choose to do so;</p>
<p>0.4. to provide customer support;</p>
<p>0.5. to gather analysis or valuable information so that we can improve our Service;</p>
<p>0.6. to monitor the usage of our Service;</p>
<p>0.7. to detect, prevent and address technical issues;</p>
<p>0.8. to fulfil any other purpose for which you provide it;</p>
<p>0.9. to carry out our obligations and enforce our rights arising from any contracts entered into between you and us, including for billing and collection;</p>
<p>0.10. to provide you with notices about your account and/or subscription, including expiration and renewal notices, email-instructions, etc.;</p>
<p>0.11. to provide you with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless you have opted not to receive such information;</p>
<p>0.12. in any other way we may describe when you provide the information;</p>
<p>0.13. for any other purpose with your consent.</p>
<p>6. <b>Retention of Data</b></p>
<p>We will retain your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.</p>
<p>We will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period, except when this data is used to strengthen the security or to improve the functionality of our Service, or we are legally obligated to retain this data for longer time periods.</p>
<p>7. <b>Transfer of Data</b></p>
<p>Your information, including Personal Data, may be transferred to – and maintained on – computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ from those of your jurisdiction.</p>
<p>If you are located outside Nigeria and choose to provide information to us, please note that we transfer the data, including Personal Data, to Nigeria and process it there.</p>
<p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>
<p>Green Tugboat will take all the steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organisation or a country unless there are adequate controls in place including the security of your data and other personal information.</p>
<p>8. <b>Disclosure of Data</b></p>
<p>We may disclose personal information that we collect, or you provide:</p>
<p>0.1. <b>Disclosure for Law Enforcement.</b></p><p>Under certain circumstances, we may be required to disclose your Personal Data if required to do so by law or in response to valid requests by public authorities.</p><p>0.2. <b>Business Transaction.</b></p><p>If we or our subsidiaries are involved in a merger, acquisition or asset sale, your Personal Data may be transferred.</p><p>0.3. <b>Other cases. We may disclose your information also:</b></p><p>0.3.1. to our subsidiaries and affiliates;</p><p>0.3.2. to contractors, service providers, and other third parties we use to support our business;</p><p>0.3.3. to fulfill the purpose for which you provide it;</p><p>0.3.4. for the purpose of including your company’s logo on our website;</p><p>0.3.5. for any other purpose disclosed by us when you provide the information;</p><p>0.3.6. with your consent in any other cases;</p><p>0.3.7. if we believe disclosure is necessary or appropriate to protect the rights, property, or safety of the Company, our customers, or others.</p>
<p>9. <b>Security of Data</b></p>
<p>The security of your data is important to us but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>
<p>10. <b>Your Data Protection Rights Under General Data Protection Regulation (GDPR)
</b></p>
<p>If you are a resident of the European Union (EU) and European Economic Area (EEA), you have certain data protection rights, covered by GDPR.</p>
<p>We aim to take reasonable steps to allow you to correct, amend, delete, or limit the use of your Personal Data.</p>
<p> If you wish to be informed what Personal Data we hold about you and if you want it to be removed from our systems, please email us at <b>info@greentugboat.com</b>.</p>
<p>In certain circumstances, you have the following data protection rights:</p>
<p>0.1. the right to access, update or to delete the information we have on you;</p>
<p>0.2. the right of rectification. You have the right to have your information rectified if that information is inaccurate or incomplete;</p>
<p>0.3. the right to object. You have the right to object to our processing of your Personal Data;</p>
<p>0.4. the right of restriction. You have the right to request that we restrict the processing of your personal information;</p>
<p>0.5. the right to data portability. You have the right to be provided with a copy of your Personal Data in a structured, machine-readable and commonly used format;</p>
<p>0.6. the right to withdraw consent. You also have the right to withdraw your consent at any time where we rely on your consent to process your personal information;</p>
<p>Please note that we may ask you to verify your identity before responding to such requests. Please note, we may not able to provide Service without some necessary data.</p>
<p>You have the right to complain to a Data Protection Authority about our collection and use of your Personal Data. For more information, please contact your local data protection authority in the European Economic Area (EEA).</p>
<p>11. <b>Your Data Protection Rights under the California Privacy Protection Act (CalOPPA)</b></p>
<p>CalOPPA is the first state law in the nation to require commercial websites and online services to post a privacy policy. The law’s reach stretches well beyond California to require a person or company in the United States (and conceivable the world) that operates websites collecting personally identifiable information from California consumers to post a conspicuous privacy policy on its website stating exactly the information being collected and those individuals with whom it is being shared, and to comply with this policy.</p>
<p>According to CalOPPA we agree to the following:</p>
<p>0.1. users can visit our site anonymously;</p>
<p>0.2. our Privacy Policy link includes the word “Privacy”, and can easily be found on the home page of our website;</p>
<p>0.3. users will be notified of any privacy policy changes on our Privacy Policy Page;</p>
<p>0.4. users are able to change their personal information by emailing us at <b>info@greentugboat.com</b>.</p>
<p>Our Policy on “Do Not Track” Signals:</p>
<p>We honor Do Not Track signals and do not track, plant cookies, or use advertising when a Do Not Track browser mechanism is in place. Do Not Track is a preference you can set in your web browser to inform websites that you do not want to be tracked.</p>
<p>You can enable or disable Do Not Track by visiting the Preferences or Settings page of your web browser.</p>
<p>12. <b>Your Data Protection Rights under the California Consumer Privacy Act (CCPA)</b></p>
<p>If you are a California resident, you are entitled to learn what data we collect about you, ask to delete your data and not to sell (share) it. To exercise your data protection rights, you can make certain requests and ask us:</p>
<p><b>0.1. What personal information we have about you. If you make this request, we will return to you:</b></p>
<p>0.0.1. The categories of personal information we have collected about you.</p>
<p>0.0.2. The categories of sources from which we collect your personal information.</p>
<p>0.0.3. The business or commercial purpose for collecting or selling your personal information.</p>
<p>0.0.4. The categories of third parties with whom we share personal information.</p>
<p>0.0.5. The specific pieces of personal information we have collected about you.</p>
<p>0.0.6. A list of categories of personal information that we have sold, along with the category of any other company we sold it to. If we have not sold your personal information, we will inform you of that fact.</p>
<p>0.0.7. A list of categories of personal information that we have disclosed for a business purpose, along with the category of any other company we shared it with.</p>
<p>Please note, you are entitled to ask us to provide you with this information up to two times in a rolling twelve-month period. When you make this request, the information provided may be limited to the personal information we collected about you in the previous 12 months.</p>
<p><b>0.2. To delete your personal information. If you make this request, we will delete the personal information we hold about you as of the date of your request from our records and direct any service providers to do the same. In some cases, deletion may be accomplished through de-identification of the information. If you choose to delete your personal information, you may not be able to use certain functions that require your personal information to operate.</b></p>
<p><b>0.3. To stop selling your personal information. We don’t sell or rent your personal information to any third parties for any purpose. We do not sell your personal information for monetary consideration. However, under some circumstances, a transfer of personal information to a third party, or within our family of companies, without monetary consideration may be considered a “sale” under California law. You are the only owner of your Personal Data and can request disclosure or deletion at any time.</b></p>
<p>If you submit a request to stop selling your personal information, we will stop making such transfers.</p>
<p>Please note, if you ask us to delete or stop selling your data, it may impact your experience with us, and you may not be able to participate in certain programs or membership services which require the usage of your personal information to function. But in no circumstances, we will discriminate against you for exercising your rights.</p>
<p>To exercise your California data protection rights described above, please send your request(s) by email: <b>info@greentugboat.com</b>.</p>
<p>Your data protection rights, described above, are covered by the CCPA, short for the California Consumer Privacy Act. To find out more, visit the official California Legislative Information website. The CCPA took effect on 01/01/2020.</p>
<p>13. <b>Service Providers</b></p>
<p>We may employ third party companies and individuals to facilitate our Service (<b>“Service Providers”</b>), provide Service on our behalf, perform Service-related services or assist us in analysing how our Service is used.</p>
<p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>
<p>14. <b>Analytics</b></p>
<p>We may use third-party Service Providers to monitor and analyze the use of our Service.</p>
<p>15. <b>CI/CD tools</b></p>
<p>We may use third-party Service Providers to automate the development process of our Service.</p>

<p>16. <b>Behavioral Remarketing</b></p>
<p>We may use remarketing services to advertise on third party websites to you after you visited our Service. We and our third-party vendors use cookies to inform, optimise and serve ads based on your past visits to our Service.</p>

<p>17. <b>Links to Other Sites</b></p>
<p>Our Service may contain links to other sites that are not operated by us. If you click a third party link, you will be directed to that third party’s site. We strongly advise you to review the Privacy Policy of every site you visit.</p>
<p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>
<p>For example, the outlined <a href="https://policymaker.io/privacy-policy/">privacy policy</a> has been made using <a href="https://policymaker.io/">PolicyMaker.io</a>, a free tool that helps create high-quality legal documents. PolicyMaker’s <a href="https://policymaker.io/privacy-policy/">privacy policy generator</a> is an easy-to-use tool for creating a <a href="https://policymaker.io/blog-privacy-policy/">privacy policy for blog</a>, website, e-commerce store or mobile app.</p>
<p>18. <b><b>Children’s Privacy</b></b></p>
<p>Our Services are not intended for use by children under the age of 18 (<b>“Child”</b> or <b>“Children”</b>).</p>
<p>We do not knowingly collect personally identifiable information from Children under 18. If you become aware that a Child has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from Children without verification of parental consent, we take steps to remove that information from our servers.</p>
<p>19. <b>Changes to This Privacy Policy</b></p>
<p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>
<p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update “effective date” at the top of this Privacy Policy.</p>
<p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>
<p>20. <b>Contact Us</b></p>
<p>If you have any questions about this Privacy Policy, please contact us by email: <b>info@greentugboat.com</b>.</p>
<p style="margin-top: 5em; font-size: 0.7em;">This <a href="https://policymaker.io/privacy-policy/">Privacy Policy</a> was created for <b>http://greentugboat.org</b> by <a href="https://policymaker.io">PolicyMaker.io</a> on 2022-07-28.</p>
', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-26 06:51:01.540778', '2022-07-26 06:51:01.540778');
INSERT INTO pages VALUES (55, 'home', 'banner', 'thumbnail4', NULL, NULL, NULL, NULL, 'uploads/pages/1250776115-1662880097.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 16:44:55.534413', '2022-09-11 07:08:17');
INSERT INTO pages VALUES (56, 'home', 'banner', 'thumbnail5', NULL, NULL, NULL, NULL, 'uploads/pages/611101095-1662880097.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 16:47:27.648726', '2022-09-11 07:08:17');
INSERT INTO pages VALUES (54, 'home', 'banner', 'thumbnail3', NULL, NULL, NULL, NULL, 'uploads/pages/1184875498-1662880097.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 16:43:31.654834', '2022-09-11 07:08:17');
INSERT INTO pages VALUES (49, 'home', 'game-plan', 'slide', 'Awaken the Nigerian voter to his political power', NULL, 'Enlighten every Nigerian voter on his/her real political power and how to maximally wield same to restore the BALANCE of POWER as provisioned in our constitution.', 'uploads/pages/1860798099-1660604558.svg', NULL, NULL, NULL, 'www.greentugboat.org/', NULL, NULL, NULL, NULL, '2022-08-15 23:02:38', '2022-09-20 09:45:32');
INSERT INTO pages VALUES (48, 'home', 'game-plan', 'slide', 'Publish and circulate the final document', NULL, 'Publish and aggressively circulate the final draft of The People''s Agenda electronically and in print, in ALL Nigerian languages, dialects and in various versions that highlight relevant visions and tangible deliverables to all interest groups.', 'uploads/pages/544432966-1660604292.svg', '2', NULL, NULL, 'www.greentugboat.org/', NULL, NULL, NULL, NULL, '2022-08-15 22:58:12', '2022-09-20 17:07:14');
INSERT INTO pages VALUES (80, 'faq', 'faq', 'faq', 'What happens if a vendor fails to deliver?', NULL, 'The vendors name and Bank verification number will be blacklisted.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 09:18:34', '2022-09-20 09:50:33');
INSERT INTO pages VALUES (19, 'about', 'aims-objectives', 'content', NULL, NULL, '<p class="aboutDetailsText mb-20">Our primary objective is to carry out public orientation, education and mobilisation projects around policy provisions and proposals in order to increase public participation and promote socio economic advancement in the society.</p>
<p class="aboutDetailsText mb-20">To also create a forum for advocacy and sensitisation on issues that will promote the well-being of members of the society through seminars, symposia and workshops.</p>', 'uploads/pages/1004349919-1663062806.jpeg', 'uploads/pages/108106421-1663062806.jpg', 'uploads/pages/474275909-1663062806.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-11 08:46:12.592494', '2022-09-13 09:53:26');
INSERT INTO pages VALUES (70, 'faq', 'faq', 'faq', 'What does the acronym GTI stand for', NULL, 'Our full name is Green Tug Boat Initiative', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 08:28:13', '2022-09-20 08:28:13');
INSERT INTO pages VALUES (71, 'faq', 'faq', 'faq', 'What does GTI do?', NULL, 'We carry out public orientation, education and mobilization projects around policy provisions and proposals in order to increase public participation and promote socio-economic advancement in society.', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 08:33:01', '2022-09-20 08:33:01');
INSERT INTO pages VALUES (73, 'faq', 'faq', 'faq', 'How is  GTI accountable for its work?', NULL, 'All support and sponsorship are done directly to registered and approved vendors through our web portal for the purpose of full transparency and accountability.', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 08:38:40', '2022-09-20 08:38:40');
INSERT INTO pages VALUES (74, 'faq', 'faq', 'faq', 'What are GTI''s social media handles?', NULL, 'twitter @TheGreenTugboat
faceboook @Green Tug Boat Initiative
instagram @green_tugboat', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 08:47:34', '2022-09-20 08:47:34');
INSERT INTO pages VALUES (75, 'faq', 'faq', 'faq', 'How can i become a member?', NULL, 'Membership is open to all who shares our vision, objectives and core values. It is voluntary.', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 08:48:29', '2022-09-20 08:49:17');
INSERT INTO pages VALUES (76, 'faq', 'faq', 'faq', 'Do i need to pay to become a member?', NULL, 'No you dont have to pay. Membership is free and voluntary as long as you share our vision, objectives and core values shares our vision,', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 08:52:40', '2022-09-20 08:52:40');
INSERT INTO pages VALUES (77, 'faq', 'faq', 'faq', 'How can i participate?', NULL, 'You can participate in three ways:
1.) Register as a VOLUNTEER to take up tasks for causes
 2.) Register as a SPONSOR and support projects financially
 3.) Register as a VENDOR and get paid delivering goods and services as required for projects.', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 08:53:42', '2022-09-20 08:53:42');
INSERT INTO pages VALUES (78, 'faq', 'faq', 'faq', 'How can i partner with GTI?', NULL, 'As an organization you can partner with us by sending us an Email partners@greentugboat.org
As an individual you can register as a volunteer then pick the project/projects you will like to sponsor.
As a vendor you can register on our website as a vendor  and get paid delivering goods and services as required for projects', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 09:11:22', '2022-09-20 09:11:22');
INSERT INTO pages VALUES (79, 'faq', 'faq', 'faq', 'I am under 18 can i participate?', NULL, 'if you are under 18 years, you cant register as a volunteer ,partner, or a vendor.', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 09:16:43', '2022-09-20 09:16:43');
INSERT INTO pages VALUES (81, 'faq', 'faq', 'faq', 'Is GTI a political party?', NULL, 'No GTI is not a political party. We are a Not-for-profit non-governmental organization.', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 09:21:28', '2022-09-20 09:21:28');
INSERT INTO pages VALUES (82, 'faq', 'faq', 'faq', 'Is GTI currently  affiliated  with any poltical party?', NULL, 'No,GTI is not affiliated with any political party in Nigeria not currently nor in future. The organisation is strictly a non-partisan. GTI as organization and its staffs are non-partisan. Any staff who wishes to affiliate with a political party is expected to officially resign membership before joining or acting in favor of a political party. Otherwise, any such action automatically voids his/her membership of this organization.', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 09:25:38', '2022-09-20 09:34:46');
INSERT INTO pages VALUES (83, 'faq', 'faq', 'faq', 'Is GTI an opposition movement?', NULL, 'No, GTI is not an opposition movement. On the contrary, we identify and applaud the efforts of governments, and also sell the ideas that come from the people to the leaders. All our approaches are non-confrontational, non-violent, and literally non-disruptive', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 09:37:37', '2022-09-20 09:37:37');
INSERT INTO pages VALUES (72, 'faq', 'faq', 'faq', 'What are  GTI''s aims and objectives', NULL, 'To carry out public orientation, education and mobilization projects around policy provisions and proposals in order to increase public participation and promote socio-economic advancement in society.

To also create a forum for advocacy and sensitisation on issues that will promote the well-being of members of the society through seminars, symposia and workshops.', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 08:36:12', '2022-09-20 09:38:09');
INSERT INTO pages VALUES (84, 'faq', 'faq', 'faq', 'Does GTI have any future political aspirations?', NULL, 'No ,there are no plans to morph into a political party or deviate from our non-partisan position. We serve the  society from a neutral position.', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 09:41:06', '2022-09-20 09:41:06');
INSERT INTO pages VALUES (86, 'home', 'game-plan', 'slide', 'Deploy technology to enable full civic responsibility', NULL, 'Develop and deliver tools and materials to enable the Electorate rise powerfully into our place of political prominence.', 'uploads/pages/1403032546-1663667492.svg', NULL, NULL, NULL, 'www.greentugboat.org/', NULL, NULL, NULL, NULL, '2022-09-20 09:51:32', '2022-09-20 09:51:32');
INSERT INTO pages VALUES (87, 'home', 'game-plan', 'slide', 'Preserve peace and harmony in all engagements', NULL, 'Ensure all people-actions under the GTI are carried out peacefully, without confrontation and 100% in line with the provisions of the constitution.', 'uploads/pages/398204361-1663667715.svg', NULL, NULL, NULL, 'www.greentugboat.org/', NULL, NULL, NULL, NULL, '2022-09-20 09:55:15', '2022-09-20 09:55:15');
INSERT INTO pages VALUES (85, 'faq', 'faq', 'faq', 'How does GTI generate funds for its projects?', NULL, 'We  break all operations to simplest projects then invite competent  Nigerians to execute these projects. And we call on the general public scrutinize our projects and support the ones they wish to.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-20 09:49:54', '2022-09-20 10:46:04');


INSERT INTO posts VALUES (2, 'UNIFIED DATABASE', 'unified-database', 1, '<p class="p1">It is said that "Necessity is the mother of innovation.."</p>
<p class="p1">However, with the advent of modern civilisation, Nigeria appears to be one of the west African countries completely out of their depths in the struggle to adjust to the degree of change which has swept the African continent by storm and shaken it to it''s core.</p>
<p class="p1">Year by year, African countries, and especially those in the west, continually rank least on the scale of economically advanced nations, which in turn has led to the wide generalisation of most African countries as poor and undeveloped. Though Nigeria would much rather be described as a "developing" country, This claim stands to be questioned, considering the numerous setbacks we contend with.</p>
<p class="p1">However, with a little more effort and willingness to participate, our country wouldn''t even have to deal with half of these baggages we are ladened with.</p>
<p class="p1">What we largely need to do is change or improve on our methods of problem solving.</p>
<p class="p1">We can''t expect to achieve the same level of development in places like Japan, America,<span class="Apple-converted-space">&nbsp; </span>the U.K etcetera, while continuing with the same ineffective approaches that we have been using.</p>
<p class="p1">Werner Erhart describes as insanity "repeating identical behaviour and expecting different results"</p>
<p class="p1">Nigeria is no longer a small village with indigenous people. Since its amalgamation in 1914, we''ve become a large country, the largest in Africa in fact. Yet, it''s a sad reality that even in this time and age, we still haven''t gotten our organisational setup right.</p>
<p class="p1">Our methods of data collection, for example, is no longer functional.</p>
<p class="p1">Citizens&rsquo; data is collected and stored disjointedly everywhere, making it difficult to get an information across multiple government parastatal databases that house these data.</p>
<p class="p1">However, with some improvement in collection and storage designs, these data could play a much broader role in driving socio-economic development such as social security, proper policy formulation, crime prevention, housing, background checks and so on.</p>
<p class="p1">Practically every organisation, both public and private tend to collect certain personal information such as name, gender, address, blood group, place of birth, and so on at one time or the other. As a matter of fact, by the time you show up for your first job after completing college in Nigeria, such record would probably exist in multiple databases belonging to one or more following parastatals &mdash; National Youth Service (NYSC), Driver License (FRSC), Bank Verification Number (BVN), Tax registration (FIRS), National Census (NPC), Voter registration (INEC) etc.</p>
<p class="p1">Not surprisingly, since each of these separate databases is not aware of the other (i.e. the database are not synced).</p>
<p class="p1"><span class="Apple-converted-space">&nbsp; </span>A &ldquo;Mr. Olusegun&rdquo; who lived in &ldquo;street ABC&rdquo; in Lagos Nigeria according to his driver&rsquo;s license (FRSC database), may live in &ldquo;street XYZ&rdquo; according to the bank&rsquo;s statement (BVN database)!</p>
<p class="p1">The reason for this ambiguity is an obvious one &mdash; when different government agencies and parastatals have their own IT systems with no shared synchronisation, the result is duplicity, inconsistency and inaccuracies.</p>
<p class="p1">Since we cannot trust the data collected so far, it is not surprising that government has to invest much needed human and capital resources on new data projects or schemes such as the new national identity card project.</p>
<p class="p1">Asides the obvious redundancy of such effort, data will be entered at different times into disparate databases and this will further compound the problem of inaccuracies in such records.</p>
<p class="p1">Admittedly, the solution is not so simple. We cannot simply rip out all the databases and create a single replacement. However, there are several tools that can be used to clean, blend and consolidate these records, and while this article is not the place for such technical detail, it is important to point out that most of them can be deployed with minimal effort.</p>
<p class="p1">The associated cost of the data consolidation can be handled by a public-private partnership initiative where businesses (e.g. banks, realtors, consumer agencies etc.) that require such data from national data centre could pay for the cost of maintaining it rather than the government even though the government will still have the authority to regulate access to the data.</p>
<p class="p1">Such initiative will certainly drive innovation and open doors for modernisation and advent of big data tools (Hadoop, spark etc.) for data analytics and visualisation.</p>
<p class="p1">In a second phase, we can begin the process of evolving a single database to create new records that can be updated in future. For example, Mr. Olusegun&rsquo;s home address could get updated when he obtains a driving license through FRSC etc. instead of creating multiple records at different government agencies or parastatals.</p>
<p class="p1">While some may argue about creating more jobs with the current multiple data schemes or projects, government wastages have never improved Gross Domestic Products (GDP). However, capitalism (through new businesses), when properly enabled with data as most developed economies have shown, will further grow the economy.</p>
<p class="p1">Furthermore, there is always an associated high cost of maintaining IT systems especially databases which grow linearly with the country&rsquo;s population and in addition, could impact the performance of these data storage systems.</p>
<p class="p1">Lastly, with the data sitting in different silos, it&rsquo;s hard to derive analytical insights or information for social-economic purposes since you&rsquo;re only seeing a part of the picture with every single database. Therefore, it is time for a national data strategy in Nigeria and Africa as a whole.</p>
<p class="p1">While it is possible for one to argue against the necessity of such effort in light of other challenges confronting the continent, however, we need accurate data for national planning and economic growth.</p>
<p class="p1">For years, Nigeria has been at the crossroads of civilisation, ever so hesitant to take the bold step forward, yet not quite turning back to the arms of ancient traditionalism. This attitude of being on the fence is the reason behind a lot of the difficulties facing the country. And slowly, a brief hesitation becomes delay and delay, they say, is dangerous.</p>
<p class="p1">It''s not always easy to take that first big step, but once it''s been taken, the notion of impossibility becomes immaterial.</p>
<p class="p1">"It always seems impossible until it&rsquo;s done" &mdash; Nelson Mandela (1918 &ndash; 2013)</p>
<p class="p1">The key is in finding what best works for us, and making it work.</p>', 'It is said that "Necessity is the mother of innovation.."
However, with the advent of modern civilisation, Nigeria appears to be one of the west African countries completely out of their depths in th', 'uploads/posts/840189798-1662878375.jpg', '["6","12","13","5","4"]', '["35","21","1"]', 'publish', 0, 0, '2022-08-16 09:50:09', '2022-09-11 06:39:35');
INSERT INTO posts VALUES (1, 'RELIGION IN NIGERIA', 'raise-donations-for-amazing-charities-whenever-you-shop-online!', 1, '<p>Over the years, Religion has been destructively criticized and is still passing through criticisms largely due to the hardships and devastation humanity has suffered over the centuries as a result of many wars caused or justified by religion. The Crusades,&nbsp; The Islamic Jihads, and the European Religious Wars, are some of the examples.</p>
<p>It was on this basis that religion has been seen as a source of worry to humanity.</p>
<p>However, &nbsp;religion has equally played an enormous role in human history and in the overall development of humanity.<br>Religion contributed to the foundations of formal education and library system, university institutions, the cultural foundations of Europe, Arab and numerous countries of the world. It also contributed to scientific discoveries and technological innovations.&nbsp;<br>On one hand it promoted the sanctity of individual human life, fundamental equality of all men, man&rsquo;s liberty, antislavery and abolitionist ideology, religious freedom, domestic stability and favourable attitude to work.&nbsp;</p>
<p>Considering all these therefore, the problem does not appear to be religion itself, which is simply the commitment or devotion to individual/collective religious faith or observance. The problem lies in the indoctrination of poeple with religious sentiments and the interference of politics in religious beliefs, which has in turn led to a bias which often results in religious clashes.<br>However, rather than dwell on the negative effects of the past, we ought to dwell on and harness the positive in shaping our individual lives and the society as a whole, while also fashioning ways to mitigate the negative tendencies of extremist religious differences.</p>
<p>&nbsp;We need to develop policies that support and validate every citizens individual beliefs, as well as disbeliefs, according to their individual and constitutional rights to freedom of and from religion, which expresses the liberty to freely practice any religion they want or no religion at all as provisioned in section 38(1) of the Nigerian constitution. Government has to technically be blind to individual choice of religion and support every individual to practice and follow his convictions within the ambit of the law and respect for the rights and liberties of others.</p>
<p>For instance, rather than fixed religious celebrations like Christmas, Sallah, and Easter, government should simply grant a fixed number of days a year as religious celebration leave as a Lanour Law, allowing each person to decide which celebrations s/he wants to take off work.&nbsp;<br><br>Religious celebration bonuses can also be introduced to support each idividual in fulfilment of his religious aspirations. Pilgrimage loans and visa support will also add immense value to every citizen.</p>
<p>With the availability and provision of such state support, citizens will be able to achieve their chosen religious goals which can be a revitalizing experience for them and an all together good thing for them as well as their professional endeavors, for they come back re-energized and focused. The religious leaves also ensure that they have the right to attain to this form of spiritual fulfilment without feeling guilty about letting their work suffer or having their salaries deducted in their absence.</p>
<p><br>This way, the people are assured and confident in the fact that the government cares about them, and is invested in protecting and supporting their good and honest interests even in their most basic and individual lives.</p>
<p>Government can also invest in religious organizations as they are equally a form of Charity outlets that reach out to the weak and needy amongst us.&nbsp;<br>&nbsp;Provision for Worship Center Compliance Grants can also be made to promote well organized religious association. Such<span style="font-family: -apple-system, BlinkMacSystemFont, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Open Sans'', ''Helvetica Neue'', sans-serif;"> provision for compliance can include the stipulations of adhering to structural plans of building capacities that fit into a preexisting organized geographical plan and enforcement of soundproofed worship centers so as to prevent an overlapping of worship and to prevent constituting nuisance to other individuals of different faith or beliefs.&nbsp;</span></p>
<p>This can also extend to a prohibition of religious display that can be construed as a form of harassment in public spaces, such as the work place, roads, and other social settings.</p>
<p>In the light of all these however, the government must strive to maintain a neutral and unbiased interest in providing a support mechanism for religious believers and non believers alike.&nbsp;<br>The Nigerian government by constitution is secular, and as such, free from any religious sentiments&nbsp; that might affect its legal process of decision making and policy formulation. Every policy that is made in government should therefore be in the view and general interest of every Nigerian citizen and individual benefit, regardless of their gender, tribe or Religious affiliation, beliefs or lack thereof.&nbsp;</p>
<p>&nbsp;</p>
<p>In conclusion, Religious leaders should as a matter of urgency and commitment be challenged to review the tenets and creeds of their religions and get rid of anything that tends to erode their cherished value for human development, and to focus more on their works of civilizing humanity.</p>', 'Over the years, Religion has been destructively criticized and is still passing through criticisms largely due to the hardships and devastation humanity has suffered over the centuries as a result of ', 'uploads/posts/2028790564-1662878847.jpg', '["15","14","6","12","13"]', '["37","36","38"]', 'publish', 0, 0, '2022-07-11 21:56:30', '2022-09-11 06:47:27');
INSERT INTO posts VALUES (8, 'Your Oversight Duty', 'the-imbalance-of-power', 1, '<p>The constitutional powers of the electorate, to Vote officials in to public office as well as the manner in which legislators can be recalled is enshrined in Section 56, 69 and 110 of the 1999 Nigerian constitution.<br>These constitutional rights empowers Nigerian citizens to VOTE IN and RECALL legislators. To Employ them, and to sack them. Like government employs and sacks errant workers.&nbsp;<br>Just as companies employ and sack unproductive staff to ensure the organisations survive and grow, we too must be vigilant to not only employ these officials (by voting them in), but to also be armed and ready to sack underperforming legislators (by recalling them) at all levels; Senators, House of rep members, House of assembly members, and local councillors. &nbsp;<br>This power isn''t individual. Just as elections are conclusively &nbsp;determined by a majority vote for a winning party, a successful recall process is determined by a simple majority of "Yes" votes in a conducted referendum amongst other tasks. Therefore, the power to vote and recall legislators, remain a collective authority and as such, We need to be very conscious of the relevance of our collectiveness which empowers us in carrying out our duty and responsibility. We function as one entity regardless of our individual votes, It is the outcome that &nbsp;represents our collective position.&nbsp;<br>We must be focused and intentional in participating and intelligently voting in legislators based on their demonstrated understanding and support for our articulated collective interests, and not based on ethnic or religious biases.<br>&nbsp;We must also stay focused and actively participate in carrying out our collective legislature-oversight functions by following up on their law-making and executive oversight functions.<br>We must always be ready and fully prepared like every law-enforcement officer, to arrest legislative disappointments and poor representation by speedily recalling our errant legislators via a collective vote of no confidence.<br>The same way the executive must use the police to arrest errant citizens, is the same way the legislators must decisively impeach errant executives, we too must recall all deviant representatives who stop effectively representing our popular interests.<br>This also places a big burden on us to clearly and thoroughly determine and articulate our popular interests. We must evolve an articulate agenda and the necessary legislations to help the executive deliver the agenda as and when due.<br>&nbsp;It also means we must closely follow all legislative activities to be sure nothing is being proposed that will jeopardise our chosen interests and agenda. The People''s Agenda MUST be protected and defended. It must be determined by WE the people ourselves.<br>"Don''t sleep!", "wake up!", police your own legislators! The GTI is providing you the powerful tool to carryout your personal legislature-oversight functions through the C.O.P app and media programs. You and I are now legislative COPs. (Civic Oversight Platform). Arm yourself with it!</p>
<p>&nbsp;</p>
<p>&nbsp;</p>', 'The constitutional powers of the electorate, to Vote officials in to public office as well as the manner in which legislators can be recalled is enshrined in Section 56, 69 and 110 of the 1999 Nigeria', 'uploads/posts/673199640-1663062322.jpg', '["16","6"]', '[null]', 'publish', 0, 0, '2022-09-13 08:31:52', '2022-09-13 09:45:22');
INSERT INTO posts VALUES (7, 'WEAPONISING HOPE TO VAPORIZE CORRUPTION', 'weaponising-hope-to-vaporize-corruption', 1, '<p>&nbsp;</p>
<p><br>The root of corruption in Nigeria, stems from the pervasive sense of utter HOPELESSNESS that an average citizen is faced with. This dire situation has grown on us and degenerated greatly over the decades, no thanks to the continual failure of our leaders to inspire hope, through words, actions and effective policy design and implementations.<br>An average civil servant has no hope of &nbsp;financial security upon retirement.A qualified graduate has no hope of getting a job in his/her field of study based on merit or qualifications alone.<br>Therefore, Most people have taken it upon themselves to fend for themselves by whatever means possible. At the slightest opportunity, an average person would embezzle as much asset as they can get away with.</p>
<p>As a key necessity for survival, especially in hard times, people who give in to corrupt practices, equally tend to develop coping mechanisms with which to evade regulating bodies &nbsp;(ie the Economic and Financial Crimes commission) empowered to deter their shady methods.&nbsp;<br>This is because, the need to survive is a fundamental driving force. And so, if a person believes that engaging in corrupt practices is their only chance at surviving a crumbling economy, there''s hardly anything you can do to dissuade them from their perceived means of livelihood.<br>In an environment of hopelessness, fighting corruption will forever remain an exercise in futility, unless you attack the root cause of their fear and transform it into a reason to hope.&nbsp;<br>Under better circumstances, most Nigerians would never resort to corrupt practices.This can only be achieved by building an economy which makes corruption less attractive. An economy on which an average Nigerian citizen can wholly depend. To build such an economy, we will be needing all the help and resources we can get.<br>Resources that are scattered all over the world in private accounts and investments that should have been established in Nigeria, but are not because most of these investments are funded by embezzled and illegitimate funds that belongs to the nation.<br>In its efforts to fight corrupt practices, especially in the government, The Economic and financial Crimes commission (EFCC) Has arraigned over 30 prominent politicians, and have been said to recover about 152 billion dollars from loots.This is however, not inclusive of up to half of the culprits who have been able to evade prosecution and those who hide behind the cloak of diplomatic immunity.<br>Further more, if amount of National funds embezzled from the Nigerian economy since its independence till now alone, be taken off an average economy, it would have been tantamount to an economic suicide, aComplete annihilation and destabilisation. But here we still are, Struggling, but not quite dead.&nbsp;<br>&nbsp;Now imagine if even half of these embezzled funds could be repatriated back into the nation''s economy...Just Imagine the wonders it would do. The instant and complete transformation that becomes possible.<br>You may wonder though, if this is even remotely possible. Can it be done? The concept may appear laughable and &nbsp;highly improbable.However, no matter how much unlikely it may seem, it is still very much possible.</p>
<p>There''s a definite bridge between fantasy and reality.<br>And that is just the calculated effort and work we put in.All that needs to happen is to get these culprits, (well, at least 90% of them,) to willingly and voluntarily subscribe to the grand plan and return what they have taken.</p>
<p>Again, you might wonder, how on earth is this going to be ever happen..?How do you get a person, so accustomed to a high standard of living and unlimited luxury, to "willingly and without coercion,&rdquo; give up his luxury and fall on the mercy of the country he has offended?&nbsp;</p>
<p>Admittedly, it may seem impossible, short of a miracle and some divine intervention.However, it is quite the opposite.<br>Humans are naturally self-preserving. So, good intentions aside, and with the present economy, I suppose no average person would want to give up a life of riches just like that, would they..?<br>Well, all that needs to happen is for the government to present these offenders, an offer they can''t resist. &nbsp;With what we are proposing, no one is expected to exchange a pleasant life for peasant living.In fact, the proposed solution is a rare case of eating your cake and having it of sorts.&nbsp;<br>And it''s nothing strange or out of the ordinary. It is the plain and simple offer of "Amnesty", a conditional amnesty in this case. We do want that money back in the economy after all, don''t we..?</p>
<p>It is said that &ldquo;to err is human but to forgive is divine&rdquo;. However, whilst a form of forgiveness might be necessary here, it has to be given conditionally, so that the ultimate purpose for granting such clemency is fully achieved and highly visible. This is why we are proposing an Amnesty on three key conditions...<br>&nbsp;1. &nbsp;FULL DISCLOSURE of all past public funds misappropriations and asset acquisitions, old and recent, up to 90% (if not 100%) at the very least.<br>&nbsp;2. FORFEITURE of at least 25% of assets, which will be returned to the nation''s fund pocket.<br>&nbsp;3. REPATRIATION; 75% of what is left after the 25% forfeiture to be pooled back into or retained within the nation''s economy in investments and bonds.&nbsp;<br>&nbsp;That is to say, 75% of the person''s remaining asset within the country and/or scattered around the globe in both their fixed and current nature, (i.e monetary and non-monetary form), would be returned back to the economy.<br>&nbsp;In essence, it means that if one owned a billion dollars in a Swiss account, or a London, American or even German account, s/he would have to transfer the bulk of that money back to a Nigerian account or into Nigeria based assets and investments, till at least 75% of all his/her assets are locally domiciled.&nbsp;<br>If he/she has a school or other forms of business organisations in foreign countries, he/she would have to liquidate such or at least, sell off the needed percentage and repatriate the proceeds back to Nigeria.</p>
<p>We propose, this said Amnesty be strictly limited in time coverage and to a specific period that would be clearly stated (i.e from 1960 to 2022 ) and a time frame for compliance strictly set &nbsp;(i.e compliance within 6months from the time of declaration of amnesty) to put things in perspective. 100% disclosure within specific window of time, or else the pardon is automatically voided.<br>This offer is a win-win situation for all parties involved, and a fair consideration by any and every means.<br>The offenders gain some form of a national pardon and the economy gets the much needed boost, which would inspire hope amongst the citizens as well as provide stability and social security for the average Nigerian. With this renewed hope, the propensity for corrupt practices will naturally and steadily decline till it becomes a thing of the past and reminder of the unwholesome place we once were as a nation.</p>
<p>&nbsp;</p>', '&nbsp;
The root of corruption in Nigeria, stems from the pervasive sense of utter HOPELESSNESS that an average citizen is faced with. This dire situation has grown on us and degenerated greatly over ', 'uploads/posts/328612347-1662876572.jpg', '["15","6"]', '[null]', 'publish', 0, 0, '2022-09-06 11:30:18', '2022-09-11 06:09:32');
INSERT INTO posts VALUES (6, 'WORKING IN NIGERIA', 'working-in-nigeria', 1, '<p>It is no one''s wish to work like an elephant only to eat like an ant, yet an average person would rather eat like an ant than starve to death all together. Which is why a lot of Nigerians have fallen victim to exploitation and the vices of modern slavery, even though we have labor laws that are supposed to protect us from those very pitfalls and more.<br>Sadly, Nigeria''s labor laws are selective and non-inclusive at best as it does not even cover executive, administrative, technical or professional roles and often times, the stipulations designed to protect the employee has been turned to the favour of the employer instead.</p>
<p>Perhaps, the shortcomings of the Labor Act are not so glaring in the public sector, where public staff are at liberty to report an injustice without necessarily facing the perils of losing their means of livelihood. However, the same cannot be said for the private sector where employees face a greater risk, especially at the hands of foreign employers who are confident in their ability to evade the law.<br>Employees are made to work round the clock, with little or no guarantee of an overtime pay. They face all sorts of harassment which they can not report, because hardly anything is ever done about the few cases reported. In some corporate organisations, female staff are cajoled to engage in all sorts of debauchery in an effort to keep up with competition and meet unreasonable targets with time limits.</p>
<p>Most of the factory workers do not have health insurance or proper working equipment, even though they work in hazardous conditions.<br>Some are put right to work immediately without proper orientation or training.<br>And in the eventuality of death or fatal injuries, little or no compensation is availed and portions of their wages or salaries are deducted for petty reasons. Yet, people continually work in such horrible conditions, subjected to modern day slavery and facing inhumane treatments on a daily basis all because they feel they have no choice.&nbsp;<br>Perhaps, the worst part of all this, is the fact that a majority of these inhumanities are perpetuated by foreigners living in our country who now seem to have more rights and privilege compared to an actual Nigerian citizen and have no qualms with rubbing this unfortunate abnormality in our faces. Like taunting a motherless cub.<br>But Nigerians are not motherless and we cannot continue to subject ourselves to pathetic helplessness when we have a government to look up to and a constitution to ensure our rights to fair treatment.</p>
<p>The labor law act should be upgraded in a way that is more inclusive and less ambiguous, so that employers would not continually take advantage of the loop holes.<br>The need for an on-the-job training also cannot be over-emphasised. It is crucial to improve the quality of service delivery of an employee, so that employees continually add capacity to themselves and increasing value to the organisation.<br>&nbsp;A lot has been said concerning the minimum wage, but not much has been done and this has always been a concern, more so now than ever considering the economic state of the country. Therefore, an improved, and internationally comparable wage system should once again be developed and promptly implemented.<br>As regarding the matter of expatriates working within our borders, there have always been laws designed to regulate the admission of expatriates into Nigeria. All that is left to do is for the necessary authorities to ensure that these regulations are thoroughly enforced.&nbsp;<br>For instance, an expatriate should not be employed to fill in a position that a citizen within our country''s locality can easily fill in. Therefore, unless it is a job requiring technicality or a level of expertise which can not be obtained within the country, an expatriate should not be called upon.</p>
<p>To ensure that such stipulations are upheld, recruitment opportunities should be formally and properly publicised before the option of an expatriate is even considered. Still, credible evidence of substantial effort at local recruitment must be presented along with request for expatriate visas, along with the expatriate resume demonstrating the locally unavailable competencies.</p>
<p>Furthermore, labor offices should be properly located and equipped in order to be able to promptly respond to the reports from an individual or an organisation concerning any cases of a breach of legal and binding contracts or &nbsp;infringement upon a fundamental right provided for in the labour laws.By&nbsp;so doing, Nigerian citizens can once again be reassured in the government to protect their best interest and be assured of working in safe and conducive work environments. This will in turn, encourage productivity, and be of overall benefit to the nation''s economy.</p>', 'It is no one''s wish to work like an elephant only to eat like an ant, yet an average person would rather eat like an ant than starve to death all together. Which is why a lot of Nigerians have fallen ', 'uploads/posts/1528367311-1662877156.jpg', '["15"]', '[null]', 'publish', 0, 0, '2022-09-01 09:40:42', '2022-09-11 06:19:16');
INSERT INTO posts VALUES (5, 'HEALTH CARE REPOSITIONING', 'health-care-repositioning', 1, '<p>The provision of health care in Nigeria remains one of the basic functions of the three tiers of government; the federal, state, and local government. The primary health care system is managed by the individual local government areas (LGAs), with support from their respective state ministries of health as well as &nbsp;medical practitioners.<br>The primary health care has its sub-level at the village, district, and LGA. The secondary health care system is managed by the ministry of health at the state level. &nbsp;The tertiary primary health care is provided by teaching hospitals and specialist hospitals. At this level, the federal government also works with voluntary and nongovernmental organisations, as well as private practitioners.</p>
<p><br>Before independence in 1960, a 10-year developmental plan, spanning the period of 1946&ndash;1956, was introduced to enhance health care delivery. Several medical schools and institutions (Ministry of Health, several clinics and health centres) were developed according to this plan. By the 1980s, there had been a great development in health care&mdash;general hospitals and over 10,000 several other health centres had been introduced.</p>
<p>In August 1987, The federal government launched its primary health care plan but<br>this health care plan made little impact on the health sector, as it continued to suffer major infrastructural, and personnel deficit, in addition to poor public health management.<br>Although the total expenditure in health sector amounts to 4.6% GDP, financial managerial competency, besides inadequate funding, remains a major problem.</p>
<p>As an effort by the federal government to revitalise the worsening state of health, the Nigerian health insurance scheme (NHIS) was established in 2005. However, the objectives and functions of the NHIS according to present review have hardly attained any height as health care delivery continues to be limited, inequitable and does not meet the needs of the majority of the Nigerian people. This is indicative of the high infant mortality rate/poor maternal care, very low life expectancy as at 2010, and periodical outbreak of disease, as well as the long period of time spent for control of the various outbreak of diseases.</p>
<p><br>In spite of the various reforms to increase the provision of health to the Nigerian people, health access is only 43.3%. The inadequacy of the health care delivery system in Nigeria could be attributed to the peculiar demographics of the Nigerian populace. About 55% of the population live in the rural areas and only 45% live in the urban areas.<br>&nbsp;About 70% of the health care is provided by private vendors and only 30% by the government.<br>Over half of the population live below the poverty line, on less than the equivalent of $1 a day and so cannot afford the high cost of health care.<br>The few who can afford health care, also face certain difficulties such as a low response rate in times of emergency.There''s also the matter of false diagnosis due to the inadequacies in the equipments used for record keeping and tracking in our health sectors.<br>Not everyone is privileged to afford private health care as aforementioned and even in the cases of a few privileged people who can afford a private family doctor, there''s the matter of unforseen contingencies for instance,If a diabetic person was to be involved in a car accident outside his or her area of residence, and happens to be in need of emergency treatment, the emergency team could unwittingly administer a type of treatment that might put such a person at more risk than actually save the person.</p>
<p>The way forward in improving our health sectors would be to address the Several flaws and technological challenges in the health care delivery system, such as developing an efficient and effective medical record system. We can have The way forward in improving our health sectors would be to address the Several flaws and technological challenges in the health care delivery system, such as developing a efficient and effective medical record system. We can have every person carrying a National ID featuring a data chip that locally stores his/her medical history, specially encrypted and only readable from specialised reader gadgets that are strictly licensed to relevant medical professionals.This&nbsp; would go along way in preventing the harm of mis-diagnosis which could sometimes kill faster than the actual ailment.With this improved technology, medical personnels would be able to see the primary medical history of each patient, especially in a case of emergency when such a person is unconscious or too disoriented to provide this information on their own, and thus be able to avoid certain treatments that might be detrimental to the patient.</p>
<p><br>NAFDAC QR codes&nbsp; should be made available to protect customers from purchasing expired and low quality medical products which can be dangerous to their health, from private pharmacies and over the counter drugstores. The practice of verifying the authenticity and shelf-life of drugs before purchase should be definitely be promoted and people highly sensitised about it.&nbsp;</p>
<p>On another note, there &nbsp;should be government support, incentives and initiatives to promote private health care developments. Carefully drawn initiatives that will go a long way to subsidise primary health care delivery, especially in the rural areas.This can be done by availing loans for the establishment of more private PHCs, pharmacies and medical outreaches.</p>
<p>A well developed and effective Management and information system (MIS), would equally go a great length in improving the medical sector.In fact, the application of &nbsp;this advanced technological management system would have immensely done a lot to improve the medical sector and eradicate the past difficulties experienced in the sector as most of these difficulties could have been easily averted through an adequate MIS, which is supposed to be the first line of approach to developing the Nigerian health care system.</p>
<p>Literature data reports huge developments of Management Information systems (MIS) in Europe and most especially in the United States in the last few decades. For instance, the MediSys is adapted and used by 11 national public health care system of Europe and 4 supranatural organizations, including World Health Organization and Euro-Surveillance.&nbsp;<br>MIS systems have been used to combat and effectively monitor the outbreak of communicable diseases and bio-attack.One of the most advanced MIS systems used today is the BioWatch which is presently installed in 30 US cities to constantly monitor bio-threats.&nbsp;</p>
<p>Practically, no attention is given to surveillance systems in Nigeria. Hence, a major shortcoming of the Nigerian health care system is the absence of adequate MIS systems to track disease outbreaks, mass chemical poisoning, and so on.The huge problems encountered by the Nigerian health care system could partly be due to the absence of MIS system which holds the key to successful medical leadership, as well as health care delivery.<br>&nbsp;Hence, there is necessity to setup a model of MIS systems for action to suit the interest of the Nigerian people.</p>
<p>Furthermore, recent study suggests that if managed well, the National Health Insurance Scheme (NHIS) could be a useful ground for good health care delivery with about a 95 percent inclusion rate in general.</p>
<p>To achieve success in health care in this modern era, a system well grounded in routine surveillance and medical intelligence as the backbone of the health sector is necessary, besides adequate management couple with strong leadership principles.</p>', 'The provision of health care in Nigeria remains one of the basic functions of the three tiers of government; the federal, state, and local government. The primary health care system is managed by the ', 'uploads/posts/375711585-1662878009.jpg', '["6","4"]', '[null]', 'publish', 0, 0, '2022-08-31 10:00:35', '2022-09-11 06:33:29');
INSERT INTO posts VALUES (10, 'MISPLACED PRIORITIES AND FOCUS', 'misplaced-priorities-and-focus', 4, '<p>&nbsp;</p>
<p><br>The art of misdirection is the subtle, deceptive art of directing an audience''s attention towards one thing (ie -a magical effect) so it does not notice another (ie. the methods or mechanics of a trick)<br>In Apollo Robbin''s study of human behaviour, he noticed that people often don''t notice what is right in front of them. They are blinded to the things they see all the time, because they are so used to it that they don''t notice it anymore.&nbsp;<br>This does not necessarily imply that whatever preoccupation of interest that has monopolised their attention is not of any essence, but it rather suggests that such a thing might not be as much of a priority as it is otherwise assumed to be.&nbsp;<br>For instance, an average person trapped in a burning house, might give in to panic by screaming and crying out for help, while totally missing what should have been the obvious priority of conserving oxygen, doing everything to avoid inhaling the poisonous smoke, engaging safety measures to safeguard his/herself and find the nearest possible exit.</p>
<p>In the same manner, most of us as Nigerian citizens hold firmly to a misplaced focus when it comes to the subject of governance.&nbsp;<br>We''ve been perpertually roped in by the allure and distraction of executive power at the center - the presidency, whose influence we perceive to be overwhelmingly present in our everyday life. In time, we have developed an obssesive fascination with that highly esteemed office and magnified position, so much that we fail to see the finite set of elective executive offices that have far more direct impact on our lives, our governors and LG Chairmen. Even worse is how we fail to prioritize the elective legislative offices that we actually have constitutional powers to influence and moderate. We rather obsess over the executive that are constitutionally immune to us and only directly answerable to the legislature. If at all we will influence the executive, it would be indirectly through the direct influence of our legislators. Should it not be so obvious therefore where our primary focus should be, both in terms of the most relevant arm of government we should hold tight, and the closest tier of government that we should engage the most?<br>It is therefore time we stop fumbling around an idea we can''t control and start facing things that are more directly facing us. While the presidency remains a critical office whose importance can not be overemphasized in a country, Nigerian citizens must realize that they have no direct control over the executive beyond voting in the president on Election Day. It is the Legislature that wields the exclusive power of oversight over the executive.&nbsp;<br>The good news however is, we the electorate in turn, equally wield an exclusive power of oversight over the legislature, and this of course means that we can indirectly control the executive through the legislature.&nbsp;<br>Therefore it becomes very clear that we owe it to ourselves to pay as much, if not more attention to legislative elections and operations, than we do the presidential elections.<br>So, instead of stressing over and focusing fully on the possibility of a dictatorial executive who we cannot directly control in the long run after the general elections, let us spread our focus and worry more about the senator, the House of Representatives member, the House of Assembly member and the Councilor who we are constitutionally empowered to influence directly, and who in turn can directly impeach the potential dictator (at any executive level) should the need arise.&nbsp;<br>On the other hand, should a democratic president who represents the good agenda of the people, be faced with opposition from the legislature, we have the power to clear such legislative hindrance out of the way of progress. Either way, we rise to defend our democracy against selfish interests from executive or legislative corners. All we need to do now is get our priorities right and make our position clear. Whoever represents our agenda, has our votes and backing with no fear of intimidation.&nbsp;<br>Power truly resides in our numbers.</p>', '&nbsp;
The art of misdirection is the subtle, deceptive art of directing an audience''s attention towards one thing (ie -a magical effect) so it does not notice another (ie. the methods or mechanics o', 'uploads/posts/default.jpg', '["16"]', '[null]', 'publish', 0, 0, '2022-09-14 07:54:04', '2022-09-14 07:54:04');
INSERT INTO posts VALUES (11, 'MISPLACED PRIORITIES AND FOCUS', 'misplaced-priorities-and-focus', 4, '<p>&nbsp;</p>
<p><br>The art of misdirection is the subtle, deceptive art of directing an audience''s attention towards one thing (ie -a magical effect) so it does not notice another (ie. the methods or mechanics of a trick)<br>In Apollo Robbin''s study of human behaviour, he noticed that people often don''t notice what is right in front of them. They are blinded to the things they see all the time, because they are so used to it that they don''t notice it anymore.&nbsp;<br>This does not necessarily imply that whatever preoccupation of interest that has monopolised their attention is not of any essence, but it rather suggests that such a thing might not be as much of a priority as it is otherwise assumed to be.&nbsp;<br>For instance, an average person trapped in a burning house, might give in to panic by screaming and crying out for help, while totally missing what should have been the obvious priority of conserving oxygen, doing everything to avoid inhaling the poisonous smoke, engaging safety measures to safeguard his/herself and find the nearest possible exit.</p>
<p>In the same manner, most of us as Nigerian citizens hold firmly to a misplaced focus when it comes to the subject of governance.&nbsp;<br>We''ve been perpertually roped in by the allure and distraction of executive power at the center - the presidency, whose influence we perceive to be overwhelmingly present in our everyday life. In time, we have developed an obssesive fascination with that highly esteemed office and magnified position, so much that we fail to see the finite set of elective executive offices that have far more direct impact on our lives, our governors and LG Chairmen. Even worse is how we fail to prioritize the elective legislative offices that we actually have constitutional powers to influence and moderate. We rather obsess over the executive that are constitutionally immune to us and only directly answerable to the legislature. If at all we will influence the executive, it would be indirectly through the direct influence of our legislators. Should it not be so obvious therefore where our primary focus should be, both in terms of the most relevant arm of government we should hold tight, and the closest tier of government that we should engage the most?<br>It is therefore time we stop fumbling around an idea we can''t control and start facing things that are more directly facing us. While the presidency remains a critical office whose importance can not be overemphasized in a country, Nigerian citizens must realize that they have no direct control over the executive beyond voting in the president on Election Day. It is the Legislature that wields the exclusive power of oversight over the executive.&nbsp;<br>The good news however is, we the electorate in turn, equally wield an exclusive power of oversight over the legislature, and this of course means that we can indirectly control the executive through the legislature.&nbsp;<br>Therefore it becomes very clear that we owe it to ourselves to pay as much, if not more attention to legislative elections and operations, than we do the presidential elections.<br>So, instead of stressing over and focusing fully on the possibility of a dictatorial executive who we cannot directly control in the long run after the general elections, let us spread our focus and worry more about the senator, the House of Representatives member, the House of Assembly member and the Councilor who we are constitutionally empowered to influence directly, and who in turn can directly impeach the potential dictator (at any executive level) should the need arise.&nbsp;<br>On the other hand, should a democratic president who represents the good agenda of the people, be faced with opposition from the legislature, we have the power to clear such legislative hindrance out of the way of progress. Either way, we rise to defend our democracy against selfish interests from executive or legislative corners. All we need to do now is get our priorities right and make our position clear. Whoever represents our agenda, has our votes and backing with no fear of intimidation.&nbsp;<br>Power truly resides in our numbers.</p>', '&nbsp;
The art of misdirection is the subtle, deceptive art of directing an audience''s attention towards one thing (ie -a magical effect) so it does not notice another (ie. the methods or mechanics o', 'uploads/posts/default.jpg', '["16"]', '[null]', 'publish', 0, 0, '2022-09-14 07:54:06', '2022-09-14 07:54:06');

INSERT INTO projects VALUES (1, 'Global Food Fund', 'global-food-fund', 1, 7, '2022-07-19', '2022-07-19', '<div><strong>The world is on the brink of one of the most devastating food security crises in generations due to the effects of climate change and COVID-19.&nbsp;</strong>The war in Ukraine is exacerbating this crisis, causing global food, fuel, and fertilizer shortages and rising food prices around the world. Ukraine supplies a great deal of the world&rsquo;s corn, wheat, and sunflower seeds for cooking oil. Russia is blocking Ukraine&rsquo;s ports and destroying Ukrainian farmland, warehouses, roads, and equipment. Meanwhile, the worst drought in four decades is imperiling lives across the Horn of Africa, a region that is also dependent on Ukrainian exports.</div>
<div>&nbsp;</div>
<div>Millions of people - especially those in the most vulnerable countries around the world - are starving and facing a potentially fatal humanitarian crisis. And the problem is only escalating.</div>
<div>&nbsp;</div>
<div><strong>GoFundMe.org has partnered with the United States Agency for International Development (USAID) to direct funds to organizations that are helping to address the global food security crisis by providing immediate humanitarian relief to the most vulnerable populations.&nbsp;</strong>All donations raised on this fundraiser will be distributed to verified global nonprofit organizations combating the global food security and hunger crisis.&nbsp;<strong><em>Your tax-deductible donation will support organizations responding to food insecurity around the world.</em></strong></div>
<div>&nbsp;</div>
<div>Together, we can support communities impacted by these devastating tragedies. And, as of July 18, 2022, GoFundMe.org has approved support for the following:</div>
<div>&nbsp;</div>
<ul>
<li>CARE</li>
<li>International Medical Corps</li>
<li>International Rescue Committee</li>
<li>Oxfam</li>
<li>Save the Children</li>
<li>UNICEF USA</li>
<li>World Food Program (WFP)</li>
</ul>
<div>&nbsp;</div>
<div>We will continue to evaluate these ever-shifting situations and add recipient charities to the list as they are properly vetted to confirm funds can be sent where needed and can reach those on the ground who need support. We will post timely updates when grants have been made.</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<p><img src="https://d2g8igdw686xgo.cloudfront.net/66671077_1657912822693067_r." alt="" width="100%"></p>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div><em>Funds raised on this fundraiser will be managed by GoFundMe.org, a public charity registered in the United States (EIN 81-2279757). Donors support the GoFundMe.org fund, and GoFundMe.org selects and then distributes donations to organizations that help those affected. Your donation is tax-deductible to the extent allowed by law.</em></div>
<div>&nbsp;</div>
<div>-----</div>
<div>&nbsp;</div>
<div><em>Donations via the donate button on this site, including Apple Pay or Google Pay, are limited to $50,000 or less. To donate through a DAF; by wire, ACH, or check; stock or otherwise, please email USAID [at] gofundme [dot] org or visit us at&nbsp;</em><a class="" href="https://www.gofundme.org/off-platform-donations/" target="_blank" rel="nofollow noopener noreferrer">https://www.gofundme.org/off-platform-donations/</a></div>', 20000, 2000, '["uploads\\/projects\\/1962536596-1658235697.jpg","uploads\\/projects\\/1962536596-1658235697.jpg"]', 'uploads/projects/1962536596-1658235697.jpg', 'The world is on the brink of one of the most devastating food security crises in generations due to ', NULL, NULL, NULL, 1, 'deleted', NULL, '2022-07-19 13:01:37', '2022-07-20 13:04:57');

INSERT INTO projects VALUES (2, 'DEVELOPMENT OF OUR WEBSITE AND PROJECTS PORTAL', 'development-of-our-website-and-projects-portal', 1, 9, '2022-07-01', '2022-09-30', '<p>This website and portal provides the technological backbone for all our operations, ensuring unprecedented transparency and accoiuntability.</p>', 500000, 100000, '["uploads\\/projects\\/2034082400-1658312854.png","uploads\\/projects\\/2034082400-1658312854.png"]', 'uploads/projects/2034082400-1658312854.png', 'This website and portal provides the technological backbone for all our operations, ensuring unprece', NULL, NULL, NULL, 1, 'active', NULL, '2022-07-20 10:27:34', '2022-07-20 22:07:52');
INSERT INTO projects VALUES (3, 'GRAPHIC DESIGN, ILLUSTRATIONS AND STOCK PHOTOGRAPHY FOR THE WEBSITE', 'graphic-design--illustrations-and-stock-photography-for-the-website', 1, 9, '2022-07-25', '2023-01-25', '<p>A six month contract to ensure our website content are professionally supported with illustrations and effective visual presentation</p>', 250000, 200000, '["uploads\\/projects\\/1914341615-1658314331.jpg","uploads\\/projects\\/1914341615-1658314331.jpg"]', 'uploads/projects/1914341615-1658314331.jpg', 'A six month contract to ensure our website content are professionally supported with illustrations a', NULL, NULL, NULL, 1, 'active', NULL, '2022-07-20 10:52:11', '2022-08-16 09:48:20');
INSERT INTO projects VALUES (4, 'CONTENT GENERATION FOR WEB AND SOCIAL MEDIA ACCOUNTS', 'content-generation-for-web-and-social-media-accounts', 1, 9, '2022-05-02', '2022-11-01', '<p>We signed six-month contracts with a research assistant and a copywriter/ social media manager, to ensure we are providing needed information</p>', 1200000, 600000, '["uploads\\/projects\\/1683146592-1658314844.jpg","uploads\\/projects\\/1683146592-1658314844.jpg"]', 'uploads/projects/1683146592-1658314844.jpg', 'We signed six-month contracts with a research assistant and a copywriter/ social media manager, to e', NULL, NULL, NULL, 1, 'active', NULL, '2022-07-20 11:00:44', '2022-08-16 09:48:32');



INSERT INTO roles VALUES (2, 'Admin ', 'team', '[null]', '2022-08-16 04:56:12.879036', '2022-08-16 04:56:12.879036');
INSERT INTO roles VALUES (3, 'Coordinator', 'team', '[null]', '2022-08-16 04:56:12.879036', '2022-08-16 04:56:12.879036');
INSERT INTO roles VALUES (5, 'Supervisor', 'team', '[null]', '2022-08-16 04:56:12.879036', '2022-08-16 04:56:12.879036');
INSERT INTO roles VALUES (8, 'User', 'user', '[null]', '2022-08-16 04:56:12.879036', '2022-08-16 04:56:12.879036');
INSERT INTO roles VALUES (7, 'Editor', 'team', '["viewCategories","addCategory","editCategory","deleteCategory","viewPosts","addPost","editPost","deletePost","viewComments","approveComment","deleteComment","viewProjects","viewUsers","viewTags","addTag","editTag","deleteTag","null"]', '2022-08-16 04:56:12.879036', '2022-08-16 13:31:30');
INSERT INTO roles VALUES (1, 'Super admin', 'admin', '["viewRoles","addRole","editRole","deleteRole","viewCategories","addCategory","editCategory","deleteCategory","viewPosts","addPost","editPost","deletePost","viewComments","approveComment","deleteComment","viewProjects","addProject","editProject","deleteProject","assignProject","viewProjectCategories","addProjectCategory","editProjectCategory","deleteProjectCategory","viewUsers","addUser","editUser","deleteUser","viewSettings","systemLogs","emailLogs","appConfig","appPages","viewTags","addTag","editTag","deleteTag","viewDonations","updateDonation","viewEvents","addEvent","editEvent","deleteEvent","null"]', '2022-08-16 04:56:12.879036', '2022-09-07 08:58:25');
INSERT INTO roles VALUES (6, 'Publisher', 'team', '["viewCategories","addCategory","editCategory","deleteCategory","viewPosts","addPost","editPost","deletePost","viewComments","approveComment","deleteComment","viewProjects","addProject","editProject","deleteProject","assignProject","viewProjectCategories","addProjectCategory","editProjectCategory","deleteProjectCategory","viewUsers","appPages","viewTags","addTag","editTag","deleteTag","viewDonations","updateDonation","null"]', '2022-08-16 04:56:12.879036', '2022-09-13 11:35:08');


INSERT INTO socialshare VALUES (1, 2, '1559477606658912256', NULL, 'http://greentugboat.org/discussion/2/first-blog-post', 'First Blog Post http://greentugboat.org/discussion/2/first-blog-post', 'twitter', NULL, NULL, NULL, '2022-08-16 09:50:09', '2022-08-16 09:50:09');
INSERT INTO socialshare VALUES (2, 2, '1559846940375781376', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 10:17:45', '2022-08-17 10:17:45');
INSERT INTO socialshare VALUES (3, 2, '1559848052135022592', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 10:22:11', '2022-08-17 10:22:11');
INSERT INTO socialshare VALUES (4, 2, '1559871403133833217', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 11:54:58', '2022-08-17 11:54:58');
INSERT INTO socialshare VALUES (5, 2, '1559478002299420673', '1559477606658912256', NULL, '@TheGreenTugboat This should update on the server', 'twitter', '946760742908452864', 'Ben', 'https://pbs.twimg.com/profile_images/1530975158881636354/KyZfKVxu_normal.jpg', '2022-08-17 12:39:16', '2022-08-17 12:39:16');
INSERT INTO socialshare VALUES (6, 2, '1559871904072228865', '1559871403133833217', NULL, '@TheGreenTugboat Comment here', 'twitter', '946760742908452864', 'Ben', 'https://pbs.twimg.com/profile_images/1530975158881636354/KyZfKVxu_normal.jpg', '2022-08-17 12:39:17', '2022-08-17 12:39:17');
INSERT INTO socialshare VALUES (7, 2, '1559871743057092608', '1559871403133833217', NULL, 'Comment here', 'twitter', '1523643984534454272', 'Green Tugboat', 'https://pbs.twimg.com/profile_images/1523644260825939969/KHsF06pv_normal.jpg', '2022-08-17 12:39:18', '2022-08-17 12:39:18');
INSERT INTO socialshare VALUES (8, 2, '1559896936823398400', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 13:36:26', '2022-08-17 13:36:26');
INSERT INTO socialshare VALUES (9, 2, '1559897287434059776', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 13:37:49', '2022-08-17 13:37:49');
INSERT INTO socialshare VALUES (10, 2, '1559904636987150336', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 14:07:01', '2022-08-17 14:07:01');
INSERT INTO socialshare VALUES (11, 2, '1559904952352653317', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 14:08:17', '2022-08-17 14:08:17');
INSERT INTO socialshare VALUES (12, 2, '1559911130763767809', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 14:32:50', '2022-08-17 14:32:50');
INSERT INTO socialshare VALUES (13, 2, '1559911678678306818', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 14:35:00', '2022-08-17 14:35:00');
INSERT INTO socialshare VALUES (14, 2, '1559911761452879873', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 14:35:20', '2022-08-17 14:35:20');
INSERT INTO socialshare VALUES (15, 2, '1559913709467623424', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 14:43:04', '2022-08-17 14:43:04');
INSERT INTO socialshare VALUES (16, 2, '1559914031594385409', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 14:44:21', '2022-08-17 14:44:21');
INSERT INTO socialshare VALUES (17, 2, '1559914706415996931', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 14:47:02', '2022-08-17 14:47:02');
INSERT INTO socialshare VALUES (18, 2, '1559915100839899136', NULL, 'http://greentugboat.org/discussion/2/unified-database', 'UNIFIED DATABASE http://greentugboat.org/discussion/2/unified-database', 'twitter', NULL, NULL, NULL, '2022-08-17 14:48:36', '2022-08-17 14:48:36');
INSERT INTO socialshare VALUES (19, 4, '1564909138190032897', NULL, 'http://greentugboat.org/discussion/4/test', 'Test http://greentugboat.org/discussion/4/test', 'twitter', NULL, NULL, NULL, '2022-08-31 09:33:08', '2022-08-31 09:33:08');
INSERT INTO socialshare VALUES (20, 5, '1564916052487614464', NULL, 'http://greentugboat.org/discussion/5/health-care-repositioning', 'HEALTH CARE REPOSITIONING http://greentugboat.org/discussion/5/health-care-repositioning', 'twitter', NULL, NULL, NULL, '2022-08-31 10:00:36', '2022-08-31 10:00:36');
INSERT INTO socialshare VALUES (21, 6, '1565273434317213698', NULL, 'http://greentugboat.org/discussion/6/working-in-nigeria', 'WORKING IN NIGERIA http://greentugboat.org/discussion/6/working-in-nigeria', 'twitter', NULL, NULL, NULL, '2022-09-01 09:40:43', '2022-09-01 09:40:43');
INSERT INTO socialshare VALUES (22, 7, '1567112958886518787', NULL, 'http://greentugboat.org/discussion/7/weaponising-hope-to-vaporize-corruption', 'WEAPONISING HOPE TO VAPORIZE CORRUPTION http://greentugboat.org/discussion/7/weaponising-hope-to-vaporize-corruption', 'twitter', NULL, NULL, NULL, '2022-09-06 11:30:19', '2022-09-06 11:30:19');
INSERT INTO socialshare VALUES (23, 8, '1569604767835455494', NULL, 'http://greentugboat.org/discussion/8/the-imbalance-of-power', 'THE IMBALANCE OF POWER http://greentugboat.org/discussion/8/the-imbalance-of-power', 'twitter', NULL, NULL, NULL, '2022-09-13 08:31:53', '2022-09-13 08:31:53');
INSERT INTO socialshare VALUES (24, 9, '1569647785535840258', NULL, 'http://greentugboat.org/discussion/9/title', 'title http://greentugboat.org/discussion/9/title', 'twitter', NULL, NULL, NULL, '2022-09-13 11:22:49', '2022-09-13 11:22:49');
INSERT INTO socialshare VALUES (25, 10, '1569957642478698497', NULL, 'http://greentugboat.org/discussion/10/misplaced-priorities-and-focus', 'MISPLACED PRIORITIES AND FOCUS http://greentugboat.org/discussion/10/misplaced-priorities-and-focus', 'twitter', NULL, NULL, NULL, '2022-09-14 07:54:05', '2022-09-14 07:54:05');
INSERT INTO socialshare VALUES (26, 11, '1569957653526515713', NULL, 'http://greentugboat.org/discussion/11/misplaced-priorities-and-focus', 'MISPLACED PRIORITIES AND FOCUS http://greentugboat.org/discussion/11/misplaced-priorities-and-focus', 'twitter', NULL, NULL, NULL, '2022-09-14 07:54:07', '2022-09-14 07:54:07');


INSERT INTO tags VALUES (1, 'NGO', 'ngo', '2022-07-11 08:45:12.692293', '2022-07-11 08:45:12.692293');
INSERT INTO tags VALUES (2, 'Education', 'education', '2022-07-11 08:45:12.692293', '2022-07-11 08:45:12.692293');
INSERT INTO tags VALUES (3, 'Lifestyle', 'lifestyle', '2022-07-11 08:45:12.692293', '2022-07-11 08:45:12.692293');
INSERT INTO tags VALUES (4, 'Sport', 'sport', '2022-07-11 08:45:12.692293', '2022-07-11 08:45:12.692293');
INSERT INTO tags VALUES (21, 'new', 'new', '2022-08-17 14:47:01', '2022-08-17 14:47:01');
INSERT INTO tags VALUES (22, 'tag', 'tag', '2022-08-17 14:47:01', '2022-08-17 14:47:01');
INSERT INTO tags VALUES (23, 'New', 'New', '2022-08-17 14:48:35', '2022-08-17 14:48:35');
INSERT INTO tags VALUES (35, 'yes', 'yes', '2022-08-18 10:01:12', '2022-08-18 10:01:12');
INSERT INTO tags VALUES (36, 'Religion', 'Religion', '2022-08-23 12:54:41', '2022-08-23 12:54:41');
INSERT INTO tags VALUES (37, 'Peace', 'Peace', '2022-08-23 12:54:41', '2022-08-23 12:54:41');
INSERT INTO tags VALUES (38, 'Regulation', 'Regulation', '2022-08-23 12:54:41', '2022-08-23 12:54:41');



INSERT INTO users VALUES (2, 'user', 8, false, true, true, true, 'Benson', 'Arafat', 'bensonArafat', '$2y$10$Td8BV13lp648y74ppn9F4.HwkfCB/03W4PXN5kC0jcPh4wLhlJDY2', 'male', '2022-07-19', 'bensonarafat@gmail.com', 8172681841, 'uploads/photo/1430661000-1658236618.jpg', 'Plot 29A Northern outer expressway, Royal arm filling station, kubwa abuja', 'Kubwa', 10, 3, 'Jubilee', 'Jubilee', 'Wuse Zone 3', 'position', false, 'l;k;kllk;nlkj', 'Forrest Green', 1234567890, true, 'activated', '2022-07-19 13:16:26', '2022-08-16 12:57:05');
INSERT INTO users VALUES (4, 'team', 6, true, false, false, false, 'Oluwaseun', 'Ajayi', 'oluwaseun-2576', '$2a$12$89.MNoiUlJOoO0wHnz4qROQKn8NDzlZ8FAAHfCgyP.qVbSPBNrnrC', 'female', NULL, 'ajayiseun972@gmail.com', 9017622526, 'uploads/photo/1050743023-1662123797.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, false, NULL, NULL, NULL, true, 'activated', '2022-08-16 13:17:46', '2022-08-17 13:57:12');
INSERT INTO users VALUES (3, 'team', 7, true, true, false, true, 'Favour', 'Jacob', 'Nemere-Chi', '$2y$10$mI9bNSYHIlsvwcZvjrCEGORDAuGHA8qmE3W1dvay7k1lEOLYxXI1q', 'female', '1998-07-17', 'jacobfavourc@gmail.com', 7049968843, 'uploads/photo/1429456234-1662122840.png', 'Masaka', 'Nassarawa', 123456789, 45581881269, 'FMITI', '1234567', 'Area1, garki, Abuja', 'Office attendant', false, 'GTB', 'Favour Chinemerem Jacob', 536802083, true, 'activated', '2022-07-20 12:55:10', '2022-08-16 12:57:00');
INSERT INTO users VALUES (1, 'admin', 1, true, false, false, false, 'Segun', 'Akindele
', 'admin12345', '$2y$10$86PfX0UzOu2mDujs1qn7lOc.tVFUMhzJ16GpoKYazOY1dRMvNtJG.', NULL, NULL, 'info@greentugboat.org', NULL, 'uploads/photo/1160902661-1662121566.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, false, NULL, NULL, NULL, true, 'activated', '2022-07-19 08:37:46.184476', '2022-07-19 08:37:46.184476');
INSERT INTO users VALUES (7, 'user', 8, false, false, true, false, 'Oluwaseun', 'Ajayi', 'Seun', '$2y$10$JcPE6DgzACT7KjOGM8cen.OdyYudrySz9MIoUdIK9qxg40cQW42vW', 'female', '2022-09-21', 'ajayioluwaseun@gmail.com', 8187750385, 'uploads/photo/732038610-1663779037.jpeg', '78bmmmkakjsio', 'Abuja', NULL, 2055235227, NULL, NULL, NULL, NULL, false, NULL, NULL, NULL, true, 'pending', '2022-09-21 16:48:58', '2022-09-21 16:50:59');


CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

