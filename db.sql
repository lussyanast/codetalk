-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table codetalk.answers: ~9 rows (approximately)
INSERT INTO `answers` (`id`, `user_id`, `discussion_id`, `answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 12, '<p>testest</p>', '2024-06-14 00:12:36', '2024-06-14 00:12:36', NULL),
	(2, 1, 13, '<p>test</p>', '2024-06-14 05:37:43', '2024-06-14 05:37:43', NULL),
	(3, 1, 13, '<p>lorem</p>', '2024-06-14 05:37:52', '2024-06-14 05:37:52', NULL),
	(4, 1, 13, '<p>ipsum</p>', '2024-06-14 05:37:57', '2024-06-14 05:37:57', NULL),
	(6, 1, 13, '<p>jangan dihapus</p>', '2024-06-14 05:38:13', '2024-06-14 05:38:13', NULL),
	(8, 3, 12, '<p>Okay</p>', '2024-06-14 18:59:35', '2024-06-14 18:59:35', NULL),
	(9, 3, 2, '<p>Okay</p>', '2024-06-14 19:00:18', '2024-06-14 19:00:18', NULL),
	(11, 1, 14, 'keliatan ga?', '2024-06-15 02:00:02', '2024-06-15 02:00:02', NULL),
	(12, 1, 19, '<h1>Mari kita coba</h1>', '2024-06-21 04:36:44', '2024-06-21 04:36:44', NULL);

-- Dumping data for table codetalk.categories: ~31 rows (approximately)
INSERT INTO `categories` (`id`, `slug`, `name`) VALUES
	(1, 'competitive-programming', 'Competitive Programming'),
	(2, 'php', 'PHP'),
	(3, 'python', 'Python'),
	(4, 'laravel', 'Laravel'),
	(5, 'html', 'HTML'),
	(6, 'css', 'CSS'),
	(7, 'java', 'Java'),
	(8, 'javascript', 'Javascript'),
	(9, 'mysql', 'MySQL'),
	(10, 'database', 'Database'),
	(11, 'testing', 'Testing'),
	(12, 'reference', 'Reference'),
	(13, 'cpp', 'C++'),
	(14, 'sql', 'SQL'),
	(15, 'kotlin', 'Kotlin'),
	(16, 'windows', 'Windows'),
	(17, 'linux', 'Linux'),
	(18, 'macos', 'MacOS'),
	(19, 'android', 'Android'),
	(20, 'jquery', 'Jquery'),
	(21, 'r', 'R'),
	(22, 'json', 'Json'),
	(23, 'swift', 'Swift'),
	(24, 'docker', 'Docker'),
	(25, 'api', 'API'),
	(26, 'matlab', 'Matlab'),
	(27, 'dart', 'Dart'),
	(28, 'tensorflow', 'Tensorflow'),
	(29, 'pointers', 'Pointers'),
	(30, 'npm', 'NPM'),
	(31, 'django', 'Django');

-- Dumping data for table codetalk.discussions: ~16 rows (approximately)
INSERT INTO `discussions` (`id`, `user_id`, `category_id`, `title`, `slug`, `content_preview`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 'Test', 'test-1718003613', 'coba', '<p>coba</p>', '2024-06-10 00:13:33', '2024-06-10 00:13:33', NULL),
	(2, 1, 16, 'Laptop blackscreen ketika dinyalakan', 'laptop-blackscreen-ketika-dinyalakan-1718161057', 'Laptop saya blackscreen ketika dinyalakan, saya coba matikan paksa dan menyalakannya lagi baru bisa digunakan. Apa yang ...', '<p>Laptop saya blackscreen ketika dinyalakan, saya coba matikan paksa dan menyalakannya lagi baru bisa digunakan. Apa yang harus saya lakukan?</p>', '2024-06-11 19:57:37', '2024-06-11 19:57:37', NULL),
	(3, 1, 5, 'Tolong perbaiki ini', 'tolong-perbaiki-ini-1718161673', '&lt;form class="d-flex w-100 me-4 my-2 my-lg-0" role="search" action="{{ route(\'discussions.index\') }}" method="GET"&gt;...', '<pre>&lt;form class="d-flex w-100 me-4 my-2 my-lg-0" role="search" action="{{ route(\'discussions.index\') }}" method="GET"&gt;\r\n                    &lt;div class="input-group"&gt;\r\n                        &lt;span class="input-group-text bg-white border-end-0"&gt;\r\n                            &lt;img class="h-32px" src="{{ url(\'assets/images/magnifier.png\') }}" alt="Search"&gt;\r\n                        &lt;/span&gt;\r\n                        &lt;input class="form-control border-start-0 ps-0" type="search"\r\n                            placeholder="Search" aria-label="Search" name="search" value="{{ $search ?? \'\' }}"&gt;\r\n                    &lt;/div&gt;\r\n                &lt;/form&gt;<br></pre>', '2024-06-11 20:07:53', '2024-06-11 20:07:53', NULL),
	(4, 1, 8, 'Chart JS text centre in doughnut chart', 'chart-js-text-centre-in-doughnut-chart-1718195340', 'I have a circle with text within my doughnut chart js, how can i centre the text, seems to be different position dependi...', '<p><span style="color: rgb(12, 13, 14); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI Adjusted&quot;, &quot;Segoe UI&quot;, &quot;Liberation Sans&quot;, sans-serif; font-size: 15px;">I have a circle with text within my doughnut chart js, how can i centre the text, seems to be different position depending on screens.</span><br></p>', '2024-06-12 05:29:00', '2024-06-12 05:29:00', NULL),
	(5, 1, 8, 'Print DataFrame without index column', 'print-dataframe-without-index-column-1718195366', 'Is there a way to print a DataFrame to the console in JavaScript without including the ugly index column? Here is my cur...', '<p><span style="color: rgb(59, 64, 69); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI Adjusted&quot;, &quot;Segoe UI&quot;, &quot;Liberation Sans&quot;, sans-serif; font-size: 13px;">Is there a way to print a DataFrame to the console in JavaScript without including the ugly index column? Here is my current code. I am use dataframe-js but willing to try other JavaScript libraries.</span><br></p>', '2024-06-12 05:29:26', '2024-06-12 05:29:26', NULL),
	(6, 1, 13, 'Why does Clang forbid qualifiers on anonymous bit fields?', 'why-does-clang-forbid-qualifiers-on-anonymous-bit-fields-1718195400', 'I have the following test code: struct{ const int : 1; const int b : 1; } bit = {0}; int main(void) { return bit.b; } Mo...', '<p><span style="color: rgb(59, 64, 69); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI Adjusted&quot;, &quot;Segoe UI&quot;, &quot;Liberation Sans&quot;, sans-serif; font-size: 13px;">I have the following test code: struct{ const int : 1; const int b : 1; } bit = {0}; int main(void) { return bit.b; } Most compilers, including latest GCC, compile it just fine</span><br></p>', '2024-06-12 05:30:00', '2024-06-12 05:30:00', NULL),
	(7, 1, 13, 'Getting the data pointed to back in the template example where i store the address of the data', 'getting-the-data-pointed-to-back-in-the-template-example-where-i-store-the-address-of-the-data-1718195422', '#include &lt;iostream&gt; #include &lt;memory&gt; template &lt;typename T&gt; class Address { private: T* ptr; size_t si...', '<p><span style="color: rgb(59, 64, 69); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI Adjusted&quot;, &quot;Segoe UI&quot;, &quot;Liberation Sans&quot;, sans-serif; font-size: 13px;">#include &lt;iostream&gt; #include &lt;memory&gt; template &lt;typename T&gt; class Address { private: T* ptr; size_t size; public: Address(T item) : ptr(&amp;item)</span><br></p>', '2024-06-12 05:30:22', '2024-06-12 05:30:22', NULL),
	(8, 1, 5, 'Search bar not working with image, with own API (HTML, JSON, JavaScript)', 'search-bar-not-working-with-image-with-own-api-html-json-javascript-1718195451', 'I am trying to create a search bar tool, a website, for guitar chords that let me search specific property codes: root a...', '<p><span style="color: rgb(59, 64, 69); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI Adjusted&quot;, &quot;Segoe UI&quot;, &quot;Liberation Sans&quot;, sans-serif; font-size: 13px;">I am trying to create a search bar tool, a website, for guitar chords that let me search specific property codes: root and key. When I tried adding an image for each object the code messes it up and</span><br></p>', '2024-06-12 05:30:51', '2024-06-12 05:30:51', NULL),
	(12, 4, 12, 'ACT4_LUSSY TRIANA_50421757 edited', 'act4-lussy-triana-50421757-1718284066', 'Ini adalah activityku', '<p>Ini adalah activityku</p>', '2024-06-13 06:07:46', '2024-06-13 06:34:44', NULL),
	(13, 1, 13, 'How to get a value where button click?', 'how-to-get-a-value-where-button-click-1718344877', 'public void perintahsql()\r\n{\r\n    sql = "SELECT * FROM soal ORDER BY RAND() LIMIT 1";\r\n    tsoal = koneksi.tampil_data(s...', '<pre>public void perintahsql()\r\n{\r\n    sql = "SELECT * FROM soal ORDER BY RAND() LIMIT 1";\r\n    tsoal = koneksi.tampil_data(sql);\r\n    ide = tsoal.Rows[0].ItemArray[0].ToString();\r\n    soale = tsoal.Rows[0].ItemArray[1].ToString();\r\n    ae = tsoal.Rows[0].ItemArray[2].ToString();\r\n    be = tsoal.Rows[0].ItemArray[3].ToString();\r\n    ce = tsoal.Rows[0].ItemArray[4].ToString();\r\n    de = tsoal.Rows[0].ItemArray[5].ToString();\r\n    je = tsoal.Rows[0].ItemArray[6].ToString();\r\n    textBox1.Text = soale;\r\n\r\n    label1.Text = ide;\r\n    rbA.Text = ae;\r\n    rbB.Text = be;\r\n    rbC.Text = ce;\r\n    rbD.Text = de;\r\n    //total();\r\n\r\n    labeljawabanpersoal.Text = je;  //ini sebelumnya ga ada (yg jadi masalah nya)\r\n    //int total=0;      //ga kepake bisa dihapus\r\n    string rb = "";\r\n    //labeljawabanpersoal.Visible= false;  //ini pindahin ke load aja\r\n\r\n    if (rbA.Checked)\r\n    {        \r\n        //=true nya dihapus atau seharusnya ganti jadi == true (double samadengan)\r\n        rb = "A";\r\n    }\r\n    else if (rbB.Checked)\r\n    {\r\n        rb = "B";\r\n    }\r\n    else if (rbC.Checked)\r\n    {\r\n        rb = "C";\r\n    }\r\n    else if (rbD.Checked)\r\n    {\r\n        rb = "D";\r\n    }\r\n\r\n    if (rb == labeljawabanpersoal.Text)\r\n    {\r\n        labelskor.Text = Convert.ToString(Int32.Parse(labelskor.Text) + 10);\r\n    }\r\n}<br></pre>', '2024-06-13 23:01:17', '2024-06-13 23:01:17', NULL),
	(14, 1, 2, 'running curl in a for loop blocks access to website', 'running-curl-in-a-for-loop-blocks-access-to-website-1718344912', 'graphql\', $json_data)) { $end_count = $json_data[\'graphql\'][\'user\'][\'edge_followed_by\'][\'co', '<p>graphql\', $json_data)) { $end_count = $json_data[\'graphql\'][\'user\'][\'edge_followed_by\'][\'co<br></p>', '2024-06-13 23:01:52', '2024-06-13 23:01:52', NULL),
	(15, 3, 14, 'Ini percobaan, jangan dihapus', 'ini-percobaan-jangan-dihapus-1718416798', 'Jangan dihapus ya', '<p>Jangan dihapus ya</p>', '2024-06-14 18:59:58', '2024-06-14 18:59:58', NULL),
	(16, 1, 27, 'LUSSY TRIANA_ACT1', 'lussy-triana-act1-1718455767', 'sdsdasd', '<p>sdsdasd</p>', '2024-06-15 05:49:27', '2024-06-23 22:52:47', '2024-06-23 22:52:47'),
	(17, 1, 1, 'sdas', 'sdas-1718455789', 'sdasdada', '<p>sdasdada</p>', '2024-06-15 05:49:49', '2024-06-23 18:14:00', '2024-06-23 18:14:00'),
	(18, 6, 16, 'Bagaimana caranya menghapus file secara permanen?', 'bagaimana-caranya-menghapus-file-secara-permanen-1718852262', 'Bagaimana caranya menghapus file secara permanen? Tolong berikan aku cara step by stepnya', '<p>Bagaimana caranya menghapus file secara permanen? Tolong berikan aku cara step by stepnya</p>', '2024-06-19 19:57:42', '2024-06-19 19:57:42', NULL),
	(19, 1, 17, 'Server tiba-tiba mati', 'server-tiba-tiba-mati-1718969498', 'Server tiba-tiba mati dan tidak bisa dinyalan, apa yang harus aku lakukan?', '<p>Server tiba-tiba mati dan tidak bisa dinyalan, apa yang harus aku lakukan?</p>', '2024-06-21 04:31:38', '2024-06-21 04:31:38', NULL);

-- Dumping data for table codetalk.likeable_likes: ~12 rows (approximately)
INSERT INTO `likeable_likes` (`id`, `likeable_id`, `likeable_type`, `user_id`, `created_at`, `updated_at`) VALUES
	(5, '13', 'App\\Models\\Discussion', '1', '2024-06-14 05:36:29', '2024-06-14 05:36:29'),
	(8, '14', 'App\\Models\\Discussion', '3', '2024-06-14 18:59:20', '2024-06-14 18:59:20'),
	(9, '12', 'App\\Models\\Discussion', '3', '2024-06-14 18:59:30', '2024-06-14 18:59:30'),
	(10, '15', 'App\\Models\\Discussion', '3', '2024-06-14 19:00:03', '2024-06-14 19:00:03'),
	(12, '2', 'App\\Models\\Discussion', '3', '2024-06-14 19:18:07', '2024-06-14 19:18:07'),
	(14, '13', 'App\\Models\\Discussion', '3', '2024-06-14 19:21:24', '2024-06-14 19:21:24'),
	(18, '6', 'App\\Models\\Answer', '3', '2024-06-14 19:42:00', '2024-06-14 19:42:00'),
	(19, '4', 'App\\Models\\Answer', '3', '2024-06-14 19:42:07', '2024-06-14 19:42:07'),
	(20, '3', 'App\\Models\\Answer', '3', '2024-06-14 19:42:08', '2024-06-14 19:42:08'),
	(26, '2', 'App\\Models\\Answer', '3', '2024-06-14 19:51:53', '2024-06-14 19:51:53'),
	(27, '14', 'App\\Models\\Discussion', '1', '2024-06-15 00:50:36', '2024-06-15 00:50:36'),
	(29, '15', 'App\\Models\\Discussion', '1', '2024-06-15 01:35:34', '2024-06-15 01:35:34');

-- Dumping data for table codetalk.likeable_like_counters: ~9 rows (approximately)
INSERT INTO `likeable_like_counters` (`id`, `likeable_id`, `likeable_type`, `count`) VALUES
	(4, '13', 'App\\Models\\Discussion', 2),
	(6, '14', 'App\\Models\\Discussion', 2),
	(7, '12', 'App\\Models\\Discussion', 1),
	(8, '15', 'App\\Models\\Discussion', 2),
	(10, '2', 'App\\Models\\Discussion', 1),
	(14, '6', 'App\\Models\\Answer', 1),
	(15, '4', 'App\\Models\\Answer', 1),
	(16, '3', 'App\\Models\\Answer', 1),
	(22, '2', 'App\\Models\\Answer', 1);

-- Dumping data for table codetalk.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(2, '2024_06_01_042145_create_users_table', 1),
	(3, '2024_06_01_042353_create_discussions_table', 1),
	(4, '2024_06_01_042654_create_category_table', 1),
	(5, '2024_06_01_042822_create_answers_table', 1),
	(6, '2016_02_07_000000_create_likeable_tables', 2);

-- Dumping data for table codetalk.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table codetalk.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `username`, `email`, `password`, `picture`, `created_at`, `updated_at`) VALUES
	(1, 'lussyanast2', 'lussyanast@example.com', '$2y$12$/Nx2p.kU5okcSg06LzKPDuYjJfbAauatkfXFQxu/Ot9UBbyZkZSwu', 'images/users/picture/qXjvtoBr8zlTiN1M28i8k9z4i8eR6nVX39AFRuh7.jpg', '2024-05-31 23:05:46', '2024-06-23 22:55:57'),
	(3, 'icylucy', 'lussyanast@student.gunadarma.ac.id', '$2y$12$KHcXPLK3DXheenJyZfMgpuQgD8AHbYBIeuOOyTfyGx6bC5zQuxQ.O', 'https://ui-avatars.com/api/?name=icylucy', '2024-06-06 06:38:53', '2024-06-06 06:38:53'),
	(4, 'icyylucyy', 'lightpewter@gmail.com', '$2y$12$h99K6dARndw92GJgZeusROxY9JUEazN6gu5q/6luXV1srQ4ptY3oW', 'https://ui-avatars.com/api/?name=icyylucyy', '2024-06-06 06:39:24', '2024-06-06 06:39:24'),
	(6, 'igan2703', 'igan2703@gmail.com', '$2y$12$/idNGxofyGuTjhgIvfnwBekP20u0h7hUaNISshM1PLf0LvqSNU3Fq', 'images/users/picture/j8693RcbHNhFXSLr2SqGC26ZTVew25BDAVr837rh.jpg', '2024-06-19 19:56:23', '2024-06-19 20:00:03'),
	(7, 'anonymous', 'd2024y068@dicoding.org', '$2y$12$DvR2qgdgR3Q72jVravZIJeCpHXM2z3iphQgGPhrbBi86sDEYdjp.m', 'https://ui-avatars.com/api/?name=anonymous', '2024-06-20 22:44:25', '2024-06-20 22:44:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
