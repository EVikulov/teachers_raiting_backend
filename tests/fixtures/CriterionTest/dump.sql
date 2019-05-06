INSERT INTO roles(id, name, created_at, updated_at) VALUES
  (1, 'user', '2016-10-20 11:05:00', '2016-10-20 11:05:00');

INSERT INTO groups(id, name, created_at, updated_at) VALUES
  (1, 'non', '2016-10-20 11:05:00', '2016-10-20 11:05:00');

INSERT INTO users(id, name, email, password, role_id, group_id, created_at, updated_at) VALUES
  (1, 'Loren Kovacek', 'khuels@example.com', 1, 1, 1, '2016-10-20 11:05:00', '2016-10-20 11:05:00');

INSERT INTO criteria(id, name, question_group, number, created_at, updated_at) VALUES
  (1, 'adipisci', 'tenetur', 'ullam', '2016-10-20 11:05:00', '2016-10-20 11:05:00');

