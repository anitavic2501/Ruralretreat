CREATE TABLE `users` (
`user_id` int(11) NOT NULL primary key,
`userfname` VARCHAR(40) NOT NULL,
`userlname` VARCHAR(40) NOT NULL,
`username` VARCHAR(40) DEFAULT NULL,
`email` VARCHAR(40)NOT NULL,
`password` varchar(80) NOT NULL,
`contact_number` varchar(30) DEFAULT NULL,
`emrgcontactname_1` varchar(40) NOT NULL,
`emrgcontactnumber_1` varchar(40) NOT NULL,
`emrgcontactname_2` varchar(40) NOT NULL,
`emrgcontactnumber_2` varchar(40) NOT NULL,
`user_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user_type` (
`user_type_id` int(11) NOT NULL primary key,
`user_type_name` varchar(30) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `dogs` (
`dog_id` int(11) NOT NULL primary key,
`dogname` varchar(40) NOT NULL,
`user_id` int(11) NOT NULL,
`breed` varchar(40) NOT NULL,
`age` int(11) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `services` (
`service` varchar(40) NOT NULL,
`service_id` int(11) NOT NULL primary key,
`date` date DEFAULT NULL,
`price` double NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `slots` (
`nos` int(11) NOT NULL primary key,
`date` date DEFAULT NULL,
`service_id` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `bookings` (
`booking_id` int(11) NOT NULL primary key,
`date` date DEFAULT NULL,
`service_id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`dog_id` int(11) NOT NULL,
`status` bit(2) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


alter table dogs 
add foreign key (user_id) references users(user_id);

alter table users
add foreign key (user_type_id) references user_type(user_type_id);

alter table bookings 
add foreign key (service_id) references services(service_id); 

alter table bookings 
add foreign key (user_id) references users(user_id);

alter table bookings
add foreign key (dog_id) references dogs(dog_id);

alter table slots
add foreign key (service_id) references services(service_id);



 


