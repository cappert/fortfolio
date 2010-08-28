CREATE TABLE project (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, description TEXT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE project_tag (project_id BIGINT, tag_id BIGINT, PRIMARY KEY(project_id, tag_id)) ENGINE = INNODB;
CREATE TABLE tag (id BIGINT AUTO_INCREMENT, name VARCHAR(45) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE project_tag ADD CONSTRAINT project_tag_tag_id_tag_id FOREIGN KEY (tag_id) REFERENCES tag(id) ON DELETE CASCADE;
ALTER TABLE project_tag ADD CONSTRAINT project_tag_project_id_project_id FOREIGN KEY (project_id) REFERENCES project(id) ON DELETE CASCADE;
