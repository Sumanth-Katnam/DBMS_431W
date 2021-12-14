# Final Project for 431W

## Team members

### 1. Venkata Shiva Sumanth Katnam (vvk5231@psu.edu) – 932612411

### 2. Manohar Bandam (mmb7103@psu.edu) - 936221910

## Purpose

A portal for university students to register for courses to attend in the current semester. We have also included some insightful reports for admins and professors.

## Target audience

Our target audience for this application is University students and professors or any administration staff (currently only one Amin user can access the system, but all the professors can use the system to access reports).

## Workflow

A student logs into the portal and will be redirected to a home page. On each page, Student can see a navigation bar on top of the screen which contains links for various pages. Students can use “My Courses” page to view a list of all the courses they have registered for that semester and has an option to drop the courses. They can use “Course Selection” page to select a course offering filtered by Stream and Course name and add them to their cart. Then they can go to the “My Cart” page and to either drop the courses from their cart or enroll to them all at once. In case a class is already filled up, student can see a such status in my cart page. Finally, students can make corrections to their name, address, phone numbers etc., from the “My Account” Page.

An Admin or a professor can login using the admin login on the portal. They will be redirected to a home page and from there they can navigate to any of the reports on the navigation bar on the top of each page in the application. Each of these reports contain insightful data from the current system and help the users in assessing the current requirements of students, professor’s availability etc.,

## Directory structure and details

### admin

This folder contains the php files for the pages that are accessible by admin. The pages are set of reports. These include

adminHome.php -- Home page after admin login

cartEntriesPerCourse.php - This report gives the count of current cart entries for each course. This helps the admin to take decision on adding new sections.

instructorAvailability.php - This report gives all the slots that an Instructor is not scheduled.

studentsPerDept.php - This report gives the count of students per department and course.

vacantSlots.php - This report gives all the slots that are available to book for a class.

### student

This folder contains php files for the pages that are accessible by students . These include

home.php - This file contains code for home page along with last logged in information

selectCourses.php - This file has the code for selecting courses page

cart.php - This file contains the code for displaying the cart page with list of courses that are added to the student's cart.

myCourses.php - courses taken by the user.

myAccount.php - student information page

### commons

this folder contains the files for environment and UI configuration.

### data

contains the data files for all the reference tables. These include

students.csv

instructores.csv

rooms.csv

schedules.csv

departments.csv

courses.csv

course_offerings.csv

### login

This folder has the files for both student and admin login and their configuration

### models

contains calss objects for all the tables and reports.

### php

php helper functions for the main php pages

### sql commands

All the sql commands involved with the database

create_views.sql

generate_data.sql

insert_data.sql

tables_creation.sql

updates.sql

### static

files for the css and js styles and functions
