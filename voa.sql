-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 08:40 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voa`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempt_quizzes`
--

CREATE TABLE `attempt_quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `attempt_at` datetime DEFAULT NULL,
  `obtained` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `course_code`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Software Engineering', 'cse', 'Computer Software Engineering', 1, '2018-04-27 13:40:13', '2018-04-27 13:40:13'),
(2, 'Web Designing', 'wd', 'Web Designing', 1, '2018-04-27 13:40:14', '2018-04-27 13:40:14'),
(3, 'Spoken English', 'elc', 'English Language Course', 1, '2018-04-27 13:40:14', '2018-04-27 13:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `course_joins`
--

CREATE TABLE `course_joins` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `helping_materials`
--

CREATE TABLE `helping_materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `subject_ref_id` int(10) UNSIGNED DEFAULT NULL,
  `teacher_ref_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_problems`
--

CREATE TABLE `lesson_problems` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_26_180844_create_roles_table', 1),
(4, '2018_02_26_181410_create_role_users_table', 1),
(5, '2018_03_06_170848_create_courses_table', 1),
(6, '2018_03_06_171330_create_course_joins_table', 1),
(7, '2018_03_06_171906_create_subjects_table', 1),
(8, '2018_03_06_172556_create_subject_teachers_table', 1),
(9, '2018_03_06_172715_create_helping_materials_table', 1),
(10, '2018_03_06_172742_create_quizzes_table', 1),
(11, '2018_03_06_172808_create_attempt_quizzes_table', 1),
(12, '2018_03_06_172850_create_lesson_problems_table', 1),
(13, '2018_03_06_172909_create_problem_solutions_table', 1),
(14, '2018_03_06_173529_add_constraints_to_course_join_table', 1),
(15, '2018_03_06_173848_add_constraints_to_subject_teachers_table', 1),
(16, '2018_03_06_173932_add_constraints_to_helping_materials_table', 1),
(17, '2018_03_06_174010_add_constraints_to_quizzes_table', 1),
(18, '2018_03_06_174054_add_constraints_to_subjects_table', 1),
(19, '2018_03_06_174205_add_constraints_to_attempt_quizzes_table', 1),
(20, '2018_03_06_174256_add_constraints_to_lesson_problems_table', 1),
(21, '2018_03_06_174330_add_constraints_to_problem_solutions_table', 1),
(22, '2018_04_04_081909_add_constraints_to_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problem_solutions`
--

CREATE TABLE `problem_solutions` (
  `id` int(10) UNSIGNED NOT NULL,
  `problem_id` int(10) UNSIGNED DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-04-27 13:40:13', '2018-04-27 13:40:13'),
(2, 'teacher', '2018-04-27 13:40:13', '2018-04-27 13:40:13'),
(3, 'student', '2018-04-27 13:40:13', '2018-04-27 13:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-04-27 13:40:14', '2018-04-27 13:40:14'),
(2, 2, 2, '2018-04-27 13:40:15', '2018-04-27 13:40:15'),
(3, 3, 3, '2018-04-27 13:40:15', '2018-04-27 13:40:15'),
(4, 3, 4, '2018-04-27 13:40:15', '2018-04-27 13:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `subject_code`, `course_id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Algorithm', 'cse101', 1, 1, 'Fundamentals of Algorithm', '2018-04-27 13:40:13', '2018-04-27 13:40:13'),
(2, 'Data Structure', 'cse102', 1, 1, 'Data Structure', '2018-04-27 13:40:14', '2018-04-27 13:40:14'),
(3, 'Operating System', 'cse103', 1, 1, 'Operating System', '2018-04-27 13:40:14', '2018-04-27 13:40:14'),
(4, 'Adobe Photoshop', 'wd101', 2, 1, 'Adobe Photoshop', '2018-04-27 13:40:14', '2018-04-27 13:40:14'),
(5, 'HTML & CSS', 'wd102', 2, 1, 'HTML and CSS', '2018-04-27 13:40:14', '2018-04-27 13:40:14'),
(6, 'Responsive Web', 'wd103', 2, 1, 'Responsive web design', '2018-04-27 13:40:14', '2018-04-27 13:40:14'),
(7, 'Business Communication', 'elc101', 3, 1, 'Business Communication', '2018-04-27 13:40:14', '2018-04-27 13:40:14'),
(8, 'Grammer', 'elc102', 3, 1, 'English Grammar', '2018-04-27 13:40:14', '2018-04-27 13:40:14'),
(9, 'Writing Skills', 'elc103', 3, 1, 'Writing skills', '2018-04-27 13:40:14', '2018-04-27 13:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teachers`
--

CREATE TABLE `subject_teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Male',
  `address` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `phone`, `gender`, `address`, `image`, `status`, `subject_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@voa.com', 'admin', '$2y$10$qwfSxSG4hziSpFPH1GDxvuUxVqP3tupgF6Qd1aEOP7YmWjF.tehiW', NULL, 'Male', NULL, '/img/default_avatar.png', 1, NULL, NULL, '2018-04-27 13:40:14', '2018-04-27 13:40:14'),
(2, 'Teacher', 'teacher1@voa.com', 'teacher1', '$2y$10$K9niTIHXSBTezBpHnErLA.pRAtNTZlV0MybSzzDtnWQYFbTjvxjb6', NULL, 'Male', NULL, '/img/default_avatar.png', 1, 4, NULL, '2018-04-27 13:40:15', '2018-04-27 13:40:15'),
(3, 'Asif Ramzan', 'bc140402040@voa.com', 'asif', '$2y$10$ufOK35ogzVeoTSXDy4UxBes41imj50j6dalsxhPqFDuGj4GqomMfO', NULL, 'Male', NULL, '/img/default_avatar.png', 1, NULL, NULL, '2018-04-27 13:40:15', '2018-04-27 13:40:15'),
(4, 'Adeel Ahmed', 'bc130402634@voa.com', 'adeel', '$2y$10$jd7wlgu/6Mz2FjERTeDLYOXGQXGS27BwnYz30qD5kEnIYtv.AuMmy', NULL, 'Male', NULL, '/img/default_avatar.png', 1, NULL, NULL, '2018-04-27 13:40:15', '2018-04-27 13:40:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempt_quizzes`
--
ALTER TABLE `attempt_quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attempt_quizzes_quiz_id_foreign` (`quiz_id`),
  ADD KEY `attempt_quizzes_student_id_foreign` (`student_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_joins`
--
ALTER TABLE `course_joins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_joins_student_id_foreign` (`student_id`),
  ADD KEY `course_joins_course_id_foreign` (`course_id`);

--
-- Indexes for table `helping_materials`
--
ALTER TABLE `helping_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helping_materials_subject_ref_id_foreign` (`subject_ref_id`),
  ADD KEY `helping_materials_teacher_ref_id_foreign` (`teacher_ref_id`);

--
-- Indexes for table `lesson_problems`
--
ALTER TABLE `lesson_problems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_problems_subject_id_foreign` (`subject_id`),
  ADD KEY `lesson_problems_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `problem_solutions`
--
ALTER TABLE `problem_solutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `problem_solutions_teacher_id_foreign` (`teacher_id`),
  ADD KEY `problem_solutions_problem_id_foreign` (`problem_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_teacher_id_foreign` (`teacher_id`),
  ADD KEY `quizzes_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_course_id_foreign` (`course_id`);

--
-- Indexes for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_teachers_student_id_foreign` (`student_id`),
  ADD KEY `subject_teachers_teacher_id_foreign` (`teacher_id`),
  ADD KEY `subject_teachers_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_subject_id_foreign` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempt_quizzes`
--
ALTER TABLE `attempt_quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_joins`
--
ALTER TABLE `course_joins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `helping_materials`
--
ALTER TABLE `helping_materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_problems`
--
ALTER TABLE `lesson_problems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `problem_solutions`
--
ALTER TABLE `problem_solutions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attempt_quizzes`
--
ALTER TABLE `attempt_quizzes`
  ADD CONSTRAINT `attempt_quizzes_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attempt_quizzes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_joins`
--
ALTER TABLE `course_joins`
  ADD CONSTRAINT `course_joins_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_joins_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `helping_materials`
--
ALTER TABLE `helping_materials`
  ADD CONSTRAINT `helping_materials_subject_ref_id_foreign` FOREIGN KEY (`subject_ref_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `helping_materials_teacher_ref_id_foreign` FOREIGN KEY (`teacher_ref_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_problems`
--
ALTER TABLE `lesson_problems`
  ADD CONSTRAINT `lesson_problems_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_problems_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `problem_solutions`
--
ALTER TABLE `problem_solutions`
  ADD CONSTRAINT `problem_solutions_problem_id_foreign` FOREIGN KEY (`problem_id`) REFERENCES `lesson_problems` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `problem_solutions_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  ADD CONSTRAINT `subject_teachers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
