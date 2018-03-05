select * from platforms ;

insert into platforms(name) values ('computer'),('ps4'); 

insert into games (name) VALUES ('pubg'), ('fifa18'), ('lol');

select * from tournaments ;

insert into tournaments (name, type, tournamentgame, platform, tournamenttime ) values 
('Pubg Madness', '1', '1', '1', '2018-02-25 10:00'),('Pubg Madness', '1', '1', '1', '2018-03-04 10:00'),('Pubg Madness', '1', '1', '1', '2018-03-11 10:00'), ('FIFA 1V1', '1', '2', '2', '2018-03-03 10:00')
;

insert into results (matchid ,val1 ,val2 ,roundid) VALUES (1, 2, 5 ,1), (3,3,8,2), (5,6,10,1),(6,1,1,1),(7,1,3,1);

insert into results (matchid ,val1 ,val2 ,roundid) VALUES (8, 1, 54 ,1);

insert into results (matchid ,val1 ,val2 ,roundid) VALUES (9,3,10,2);

insert into results (matchid ,val1 ,val2 ,roundid) VALUES (8, 1, 54 ,1);