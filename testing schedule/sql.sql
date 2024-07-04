-- Create CourseCategories table
CREATE TABLE CourseCategories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);

-- Create Courses table
CREATE TABLE Courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES CourseCategories(category_id)
);

-- Create Schedules table
CREATE TABLE Schedules (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    batch_date DATE,
    batch_time TIME,
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);

INSERT INTO CourseCategories (category_name) VALUES
('Programming'),
('Web Development'),
('Design'),
('Finance');

INSERT INTO Courses (course_name, category_id) VALUES
('PHP Programming', 1),
('JavaScript Basics', 1),
('Python for Data Science', 1),
('Frontend Web Development', 2),
('UI/UX Design Fundamentals', 3),
('Financial Modeling', 4);

INSERT INTO Schedules (course_id, batch_date, batch_time) VALUES
(1, '2024-07-01', '10:00:00'),
(1, '2024-07-15', '14:00:00'),
(2, '2024-07-05', '11:00:00'),
(3, '2024-07-10', '09:00:00'),
(4, '2024-07-03', '13:00:00'),
(5, '2024-07-08', '15:00:00'),
(6, '2024-07-12', '10:30:00');
