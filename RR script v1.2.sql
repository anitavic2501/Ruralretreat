CREATE TABLE `users` (
`user_id` int(11) NOT NULL primary key auto_increment ,
`userfname` VARCHAR(40) NOT NULL,
`userlname` VARCHAR(40) NOT NULL,
`username` VARCHAR(40) DEFAULT NULL,
`email` VARCHAR(40)NOT NULL,
`password` varchar(80) NOT NULL,
`contact_number` varchar(30) DEFAULT NULL,
`emrgcontactname_1` varchar(40) NOT NULL,
`emrgcontactnumber_1` varchar(40) NOT NULL,
`user_type_id` int(11) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user_type` (
`user_type_id` int(11) NOT NULL ,
`user_type_name` varchar(30) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `dogs` (
`dog_id` int(11) NOT NULL primary key auto_increment ,
`dogname` varchar(40) ,
`user_id` int(11) NOT NULL,
`breed` varchar(40) ,
`age` int(11) DEFAULT NULL,
`gender` varchar(80) ,
`vaccination` varchar(1000),
`datareceived` date,
`duedate` date,
`medicalcondition` varchar(1000),
`allergies` varchar(1000),
`movrestr` varchar(1000), 
`label` varchar(100) DEFAULT 'Green'
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `services` (
`services` varchar(40) NOT NULL,
`service_id` int(11) NOT NULL primary key auto_increment,
`price` double NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `slots` (
`nos` int(11) NOT NULL primary key,
`bnos` int(11) NOT NULL,
`date` date DEFAULT NULL,
`service_id` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `bookings` (
`booking_id` int(11) NOT NULL primary key auto_increment,
`startdate` date,
`enddate` date,
`service_id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`dog_id` int(11) NOT NULL,
`price` int(11)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `news` (
`news_id` int(11) NOT NULL primary key auto_increment,
`title` varchar (100) NOT NULL,
`description` varchar(3000),
`picture` blob NOT NULL 
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `reviews` (
`review_id` int(11) NOT NULL primary key auto_increment,
`name` varchar(100),
`descriprion` varchar(3000)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


 
 ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);
  
  ALTER TABLE `users`
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_type_id` (`user_type_id`);
  

 




alter table dogs 
add foreign key (user_id) references users(user_id);

alter table users
add foreign key (user_type_id) references user_type(user_type_id);


alter table bookings 
add foreign key (user_id) references users(user_id);

alter table bookings 
add foreign key (dog_id) references dogs(dog_id);


alter table slots
add foreign key (service_id) references services(service_id);



 


