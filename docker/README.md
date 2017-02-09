# docker-apache-php-oracle + Oracle
Docker Image built on Debian, with Apache2, PHP5.6, OCI8 extension and the Oracle Instant Client.

Download `oracle-instantclient12.1-basic_12.1.0.2.0-2_amd64.deb` into docker\oracle.

Run compose
docker-compose up -d

All set :)

====

docker ps

docker exec -ti docker_apache_app2_1 bash
docker exec -ti docker_oracle_node2_1 bash

rlwrap sqlplus system/oracle@//localhost:1521/XE

create tablespace cc_tool_space datafile 'cc_tool_space.dat' size 10M autoextend on;
create user cc_tool identified by 1234 default tablespace cc_tool_space;
grant create session to cc_tool;
grant create table to cc_tool;
grant unlimited tablespace to cc_tool;
exit;

rlwrap sqlplus cc_tool/1234@//localhost:1521/XE

create table test_table (id int not null, text varchar2(200), primary key (id));
CREATE TABLE  "USER"
(
    "USER_ID" VARCHAR2(10) NOT NULL,
    "ACTIVE" CHAR(1 BYTE) NULL,
    "EMAIL" VARCHAR2(255) NULL,
    "ROLE" VARCHAR2(255) NULL,
    "REPORT_ID" NUMBER(8) NULL
  );

