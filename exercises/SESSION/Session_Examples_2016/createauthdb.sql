use MixAndMatch;
create table Login ( name varchar(20), 
					 password varchar(40),
                     primary key (name)
                              );
insert into Login values ( 'username', 
                           'password' );

insert into Login values ( 'testuser', 
                            sha1('password') );
grant select on MixAndMatch.* 
             to 'webauth' 
             identified by 'webauth';
flush privileges;
