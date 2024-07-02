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

-- Dumping data for table codetalk.answers: ~28 rows (approximately)
INSERT INTO `answers` (`id`, `user_id`, `discussion_id`, `answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 12, '<p>testest</p>', '2024-06-14 00:12:36', '2024-06-14 00:12:36', NULL),
	(2, 1, 13, '<p>test</p>', '2024-06-14 05:37:43', '2024-06-14 05:37:43', NULL),
	(3, 1, 13, '<p>lorem</p>', '2024-06-14 05:37:52', '2024-06-14 05:37:52', NULL),
	(4, 1, 13, '<p>ipsum</p>', '2024-06-14 05:37:57', '2024-06-14 05:37:57', NULL),
	(6, 1, 13, '<p>jangan dihapus</p>', '2024-06-14 05:38:13', '2024-06-14 05:38:13', NULL),
	(8, 3, 12, '<p>Okay</p>', '2024-06-14 18:59:35', '2024-06-14 18:59:35', NULL),
	(9, 3, 2, '<p>Okay</p>', '2024-06-14 19:00:18', '2024-06-14 19:00:18', NULL),
	(11, 1, 14, 'keliatan ga?', '2024-06-15 02:00:02', '2024-06-15 02:00:02', NULL),
	(12, 1, 19, '<h1>Mari kita coba</h1>', '2024-06-21 04:36:44', '2024-06-21 04:36:44', NULL),
	(13, 12, 26, 'Elit, incididunt et .&nbsp;', '2024-06-30 01:53:00', '2024-06-30 01:53:00', NULL),
	(14, 12, 27, 'Beatae dolor ex volu.&nbsp;', '2024-06-30 01:53:18', '2024-06-30 01:53:18', NULL),
	(15, 12, 18, 'Totam minus quas ips.&nbsp;', '2024-06-30 01:53:33', '2024-06-30 01:53:33', NULL),
	(16, 15, 33, 'Sit, commodo sunt ut.&nbsp;', '2024-06-30 02:03:56', '2024-06-30 02:03:56', NULL),
	(17, 15, 33, 'Eum ipsum animi, dic.&nbsp;', '2024-06-30 02:04:02', '2024-06-30 02:04:02', NULL),
	(18, 15, 37, 'Exercitationem est a.&nbsp;', '2024-06-30 02:04:36', '2024-06-30 02:04:36', NULL),
	(19, 15, 37, 'Maxime qui officia f.&nbsp;', '2024-06-30 02:04:41', '2024-06-30 02:04:41', NULL),
	(20, 15, 37, 'Consequatur, quae do.&nbsp;', '2024-06-30 02:04:47', '2024-06-30 02:04:47', NULL),
	(21, 15, 37, 'Sit, quibusdam cum r.&nbsp;', '2024-06-30 02:04:53', '2024-06-30 02:04:53', NULL),
	(22, 17, 6, 'In aliquam duis ipsu.&nbsp;', '2024-06-30 02:05:54', '2024-06-30 02:05:54', NULL),
	(23, 17, 6, '<div style="text-align: center;"><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);">Et ut laboris modi d.&nbsp;</span></div>', '2024-06-30 02:06:01', '2024-06-30 02:06:01', NULL),
	(24, 18, 42, 'Cumque sed tenetur s.&nbsp;', '2024-06-30 02:06:21', '2024-06-30 02:06:21', NULL),
	(25, 19, 42, 'Sit aut ea vero prov.&nbsp;', '2024-06-30 02:06:39', '2024-06-30 02:06:39', NULL),
	(26, 20, 42, 'Laboris commodo quia.&nbsp;', '2024-06-30 02:07:20', '2024-06-30 02:07:20', NULL),
	(27, 21, 42, 'Laborum autem qui en.&nbsp;', '2024-06-30 02:08:15', '2024-06-30 02:08:15', NULL),
	(28, 22, 13, 'Esse, aut et dolore .&nbsp;', '2024-06-30 02:09:05', '2024-06-30 02:09:05', NULL),
	(29, 23, 37, '<span style="background-color: rgb(255, 255, 0);">Consequat. Minima ve.&nbsp;</span>', '2024-06-30 02:15:58', '2024-06-30 02:15:58', NULL),
	(30, 24, 14, 'Magni veritatis pari.&nbsp;', '2024-07-01 03:21:47', '2024-07-01 03:21:47', NULL),
	(31, 26, 46, 'Quod ullamco ratione.&nbsp;', '2024-07-01 04:34:20', '2024-07-01 04:34:20', NULL);

-- Dumping data for table codetalk.categories: ~29 rows (approximately)
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

-- Dumping data for table codetalk.discussions: ~44 rows (approximately)
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
	(19, 1, 17, 'Server tiba-tiba mati', 'server-tiba-tiba-mati-1718969498', 'Server tiba-tiba mati dan tidak bisa dinyalan, apa yang harus aku lakukan?', '<p>Server tiba-tiba mati dan tidak bisa dinyalan, apa yang harus aku lakukan?</p>', '2024-06-21 04:31:38', '2024-06-21 04:31:38', NULL),
	(20, 8, 30, 'Nemo repudiandae sim', 'nemo-repudiandae-sim-1719737452', 'Nihil a odio quam au.&nbsp;', 'Nihil a odio quam au.&nbsp;', '2024-06-30 01:50:52', '2024-06-30 01:50:52', NULL),
	(21, 8, 14, 'Veniam laboriosam', 'veniam-laboriosam-1719737477', 'Ex illo ducimus, sin.&nbsp;', 'Ex illo ducimus, sin.&nbsp;', '2024-06-30 01:51:17', '2024-06-30 01:51:17', NULL),
	(22, 8, 26, 'Iste porro sed sed m', 'iste-porro-sed-sed-m-1719737484', 'Cupidatat ut omnis s.&nbsp;', 'Cupidatat ut omnis s.&nbsp;', '2024-06-30 01:51:24', '2024-06-30 01:51:24', NULL),
	(23, 9, 20, 'Est qui aperiam qui', 'est-qui-aperiam-qui-1719737507', 'Magnam tempor deleni.&nbsp;', 'Magnam tempor deleni.&nbsp;', '2024-06-30 01:51:47', '2024-06-30 01:51:47', NULL),
	(24, 9, 18, 'Eaque ducimus odio', 'eaque-ducimus-odio-1719737513', 'Eu repellendus. Aspe.&nbsp;', 'Eu repellendus. Aspe.&nbsp;', '2024-06-30 01:51:53', '2024-06-30 01:51:53', NULL),
	(25, 9, 28, 'Est labore dolorem f', 'est-labore-dolorem-f-1719737521', 'Autem consequatur so.&nbsp;', 'Autem consequatur so.&nbsp;', '2024-06-30 01:52:01', '2024-06-30 01:52:01', NULL),
	(26, 9, 22, 'Est sed aut quia lor', 'est-sed-aut-quia-lor-1719737526', 'Ut ipsam a natus cor.&nbsp;', 'Ut ipsam a natus cor.&nbsp;', '2024-06-30 01:52:06', '2024-06-30 01:52:06', NULL),
	(27, 11, 28, 'Voluptatibus omnis v', 'voluptatibus-omnis-v-1719737559', 'Modi eaque amet, est.&nbsp;', 'Modi eaque amet, est.&nbsp;', '2024-06-30 01:52:39', '2024-06-30 01:52:39', NULL),
	(28, 15, 25, 'Consequuntur et culp', 'consequuntur-et-culp-1719738204', 'Cillum explicabo. El.&nbsp;', 'Cillum explicabo. El.&nbsp;', '2024-06-30 02:03:24', '2024-06-30 02:03:24', NULL),
	(29, 15, 25, 'Officiis enim nisi n', 'officiis-enim-nisi-n-1719738209', 'Totam sed est, sit, .&nbsp;', 'Totam sed est, sit, .&nbsp;', '2024-06-30 02:03:29', '2024-06-30 02:03:29', NULL),
	(30, 15, 25, 'Totam unde aperiam e', 'totam-unde-aperiam-e-1719738214', 'Tenetur harum cum mo.&nbsp;', 'Tenetur harum cum mo.&nbsp;', '2024-06-30 02:03:34', '2024-06-30 02:03:34', NULL),
	(31, 15, 30, 'Accusantium ea omnis', 'accusantium-ea-omnis-1719738218', 'Ea qui vitae explica.&nbsp;', 'Ea qui vitae explica.&nbsp;', '2024-06-30 02:03:38', '2024-06-30 02:03:38', NULL),
	(32, 15, 10, 'Ut et minim cupidita', 'ut-et-minim-cupidita-1719738225', 'Rerum vitae omnis la.&nbsp;', 'Rerum vitae omnis la.&nbsp;', '2024-06-30 02:03:45', '2024-06-30 02:03:45', NULL),
	(33, 15, 24, 'Nulla doloribus veri', 'nulla-doloribus-veri-1719738231', 'Molestiae qui illum.&nbsp;', 'Molestiae qui illum.&nbsp;', '2024-06-30 02:03:51', '2024-06-30 02:03:51', NULL),
	(34, 15, 2, 'Cillum laudantium r', 'cillum-laudantium-r-1719738250', 'Quisquam corporis la.&nbsp;', 'Quisquam corporis la.&nbsp;', '2024-06-30 02:04:10', '2024-06-30 02:04:10', NULL),
	(35, 15, 22, 'Sed Nam fuga In est', 'sed-nam-fuga-in-est-1719738257', 'Sunt qui sed enim nu.&nbsp;', 'Sunt qui sed enim nu.&nbsp;', '2024-06-30 02:04:17', '2024-06-30 02:04:17', NULL),
	(36, 15, 23, 'Autem soluta enim qu', 'autem-soluta-enim-qu-1719738264', 'Quos adipisci ipsum.&nbsp;', 'Quos adipisci ipsum.&nbsp;', '2024-06-30 02:04:24', '2024-06-30 02:04:24', NULL),
	(37, 15, 9, 'Nobis quo ducimus s', 'nobis-quo-ducimus-s-1719738269', 'Consequuntur dolor e.&nbsp;', 'Consequuntur dolor e.&nbsp;', '2024-06-30 02:04:29', '2024-06-30 02:04:29', NULL),
	(38, 17, 27, 'Vero placeat corrup', 'vero-placeat-corrup-1719738324', 'Aut adipisicing repe.&nbsp;', 'Aut adipisicing repe.&nbsp;', '2024-06-30 02:05:24', '2024-06-30 02:05:24', NULL),
	(39, 17, 21, 'Eu magnam nihil faci', 'eu-magnam-nihil-faci-1719738329', 'Voluptatem rerum bla.&nbsp;', 'Voluptatem rerum bla.&nbsp;', '2024-06-30 02:05:29', '2024-06-30 02:05:29', NULL),
	(40, 17, 1, 'Doloribus proident', 'doloribus-proident-1719738335', 'Esse, velit, elit, a.&nbsp;', 'Esse, velit, elit, a.&nbsp;', '2024-06-30 02:05:35', '2024-06-30 02:05:35', NULL),
	(41, 17, 4, 'Accusantium impedit', 'accusantium-impedit-1719738339', 'Voluptatem. Est veni.&nbsp;', 'Voluptatem. Est veni.&nbsp;', '2024-06-30 02:05:39', '2024-06-30 02:05:39', NULL),
	(42, 17, 10, 'Qui eius quibusdam l', 'qui-eius-quibusdam-l-1719738343', 'Ea enim repudiandae .&nbsp;', 'Ea enim repudiandae .&nbsp;', '2024-06-30 02:05:43', '2024-06-30 02:05:43', NULL),
	(43, 20, 10, 'Eu iure culpa conseq', 'eu-iure-culpa-conseq-1719738449', 'Magna ut vel quisqua.&nbsp;', 'Magna ut vel quisqua.&nbsp;', '2024-06-30 02:07:29', '2024-06-30 02:07:29', NULL),
	(44, 20, 22, 'Non blanditiis tempo', 'non-blanditiis-tempo-1719738454', 'Fugit, sit, id delen.&nbsp;', 'Fugit, sit, id delen.&nbsp;', '2024-06-30 02:07:34', '2024-06-30 02:07:34', NULL),
	(45, 22, 27, 'Ad eum omnis consequ', 'ad-eum-omnis-consequ-1719738515', 'Exercitation iusto q.&nbsp;', 'Exercitation iusto q.&nbsp;', '2024-06-30 02:08:35', '2024-06-30 02:08:35', NULL),
	(46, 23, 16, 'In at dolor at esse', 'in-at-dolor-at-esse-1719738938', 'Ut ut voluptas aliqu.&nbsp;', 'Ut ut voluptas aliqu.&nbsp;', '2024-06-30 02:15:38', '2024-06-30 02:15:38', NULL),
	(47, 24, 5, 'Fugiat distinctio Q', 'fugiat-distinctio-q-1719827378', 'Eius saepe sed quis .&nbsp;', 'Eius saepe sed quis .&nbsp;', '2024-07-01 02:49:38', '2024-07-01 02:49:38', NULL);

-- Dumping data for table codetalk.follows: ~3 rows (approximately)
INSERT INTO `follows` (`id`, `follower_id`, `following_id`, `created_at`, `updated_at`) VALUES
	(1, 24, 23, '2024-07-01 04:28:54', '2024-07-01 04:28:54'),
	(4, 25, 23, '2024-07-01 04:32:33', '2024-07-01 04:32:33'),
	(5, 26, 23, '2024-07-01 04:33:52', '2024-07-01 04:33:52');

-- Dumping data for table codetalk.likeable_likes: ~39 rows (approximately)
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
	(29, '15', 'App\\Models\\Discussion', '1', '2024-06-15 01:35:34', '2024-06-15 01:35:34'),
	(30, '13', 'App\\Models\\Answer', '12', '2024-06-30 01:53:05', '2024-06-30 01:53:05'),
	(31, '18', 'App\\Models\\Discussion', '12', '2024-06-30 01:53:28', '2024-06-30 01:53:28'),
	(32, '37', 'App\\Models\\Discussion', '15', '2024-06-30 02:04:32', '2024-06-30 02:04:32'),
	(33, '19', 'App\\Models\\Answer', '15', '2024-06-30 02:04:43', '2024-06-30 02:04:43'),
	(34, '6', 'App\\Models\\Discussion', '17', '2024-06-30 02:05:49', '2024-06-30 02:05:49'),
	(35, '23', 'App\\Models\\Answer', '17', '2024-06-30 02:06:05', '2024-06-30 02:06:05'),
	(36, '42', 'App\\Models\\Discussion', '18', '2024-06-30 02:06:17', '2024-06-30 02:06:17'),
	(37, '24', 'App\\Models\\Answer', '18', '2024-06-30 02:06:23', '2024-06-30 02:06:23'),
	(38, '42', 'App\\Models\\Discussion', '19', '2024-06-30 02:06:35', '2024-06-30 02:06:35'),
	(39, '24', 'App\\Models\\Answer', '19', '2024-06-30 02:06:36', '2024-06-30 02:06:36'),
	(40, '42', 'App\\Models\\Discussion', '20', '2024-06-30 02:07:14', '2024-06-30 02:07:14'),
	(41, '25', 'App\\Models\\Answer', '20', '2024-06-30 02:07:15', '2024-06-30 02:07:15'),
	(42, '24', 'App\\Models\\Answer', '20', '2024-06-30 02:07:15', '2024-06-30 02:07:15'),
	(43, '24', 'App\\Models\\Answer', '21', '2024-06-30 02:08:10', '2024-06-30 02:08:10'),
	(44, '25', 'App\\Models\\Answer', '21', '2024-06-30 02:08:10', '2024-06-30 02:08:10'),
	(45, '42', 'App\\Models\\Discussion', '21', '2024-06-30 02:08:11', '2024-06-30 02:08:11'),
	(46, '24', 'App\\Models\\Answer', '22', '2024-06-30 02:08:27', '2024-06-30 02:08:27'),
	(47, '42', 'App\\Models\\Discussion', '22', '2024-06-30 02:08:28', '2024-06-30 02:08:28'),
	(48, '25', 'App\\Models\\Answer', '22', '2024-06-30 02:08:29', '2024-06-30 02:08:29'),
	(49, '27', 'App\\Models\\Answer', '22', '2024-06-30 02:08:30', '2024-06-30 02:08:30'),
	(50, '13', 'App\\Models\\Discussion', '22', '2024-06-30 02:08:45', '2024-06-30 02:08:45'),
	(51, '6', 'App\\Models\\Answer', '22', '2024-06-30 02:08:47', '2024-06-30 02:08:47'),
	(52, '37', 'App\\Models\\Discussion', '23', '2024-06-30 02:15:46', '2024-06-30 02:15:46'),
	(53, '21', 'App\\Models\\Answer', '23', '2024-06-30 02:15:47', '2024-06-30 02:15:47'),
	(54, '14', 'App\\Models\\Discussion', '24', '2024-07-01 03:21:42', '2024-07-01 03:21:42'),
	(55, '11', 'App\\Models\\Answer', '24', '2024-07-01 03:21:43', '2024-07-01 03:21:43'),
	(56, '46', 'App\\Models\\Discussion', '26', '2024-07-01 04:34:04', '2024-07-01 04:34:04');

-- Dumping data for table codetalk.likeable_like_counters: ~22 rows (approximately)
INSERT INTO `likeable_like_counters` (`id`, `likeable_id`, `likeable_type`, `count`) VALUES
	(4, '13', 'App\\Models\\Discussion', 3),
	(6, '14', 'App\\Models\\Discussion', 3),
	(7, '12', 'App\\Models\\Discussion', 1),
	(8, '15', 'App\\Models\\Discussion', 2),
	(10, '2', 'App\\Models\\Discussion', 1),
	(14, '6', 'App\\Models\\Answer', 2),
	(15, '4', 'App\\Models\\Answer', 1),
	(16, '3', 'App\\Models\\Answer', 1),
	(22, '2', 'App\\Models\\Answer', 1),
	(24, '13', 'App\\Models\\Answer', 1),
	(25, '18', 'App\\Models\\Discussion', 1),
	(26, '37', 'App\\Models\\Discussion', 2),
	(27, '19', 'App\\Models\\Answer', 1),
	(28, '6', 'App\\Models\\Discussion', 1),
	(29, '23', 'App\\Models\\Answer', 1),
	(30, '42', 'App\\Models\\Discussion', 5),
	(31, '24', 'App\\Models\\Answer', 5),
	(32, '25', 'App\\Models\\Answer', 3),
	(33, '27', 'App\\Models\\Answer', 1),
	(34, '21', 'App\\Models\\Answer', 1),
	(35, '11', 'App\\Models\\Answer', 1),
	(36, '46', 'App\\Models\\Discussion', 1);

-- Dumping data for table codetalk.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(2, '2024_06_01_042145_create_users_table', 1),
	(3, '2024_06_01_042353_create_discussions_table', 1),
	(4, '2024_06_01_042654_create_category_table', 1),
	(5, '2024_06_01_042822_create_answers_table', 1),
	(6, '2016_02_07_000000_create_likeable_tables', 2),
	(7, '2024_07_01_111655_create_follows_table', 3);

-- Dumping data for table codetalk.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table codetalk.users: ~24 rows (approximately)
INSERT INTO `users` (`id`, `username`, `email`, `password`, `picture`, `created_at`, `updated_at`) VALUES
	(1, 'lussyanast2', 'lussyanast@example.com', '$2y$12$/Nx2p.kU5okcSg06LzKPDuYjJfbAauatkfXFQxu/Ot9UBbyZkZSwu', 'images/users/picture/qXjvtoBr8zlTiN1M28i8k9z4i8eR6nVX39AFRuh7.jpg', '2024-05-31 23:05:46', '2024-06-23 22:55:57'),
	(3, 'icylucy', 'lussyanast@student.gunadarma.ac.id', '$2y$12$KHcXPLK3DXheenJyZfMgpuQgD8AHbYBIeuOOyTfyGx6bC5zQuxQ.O', 'https://ui-avatars.com/api/?name=icylucy', '2024-06-06 06:38:53', '2024-06-06 06:38:53'),
	(4, 'icyylucyy', 'lightpewter@gmail.com', '$2y$12$h99K6dARndw92GJgZeusROxY9JUEazN6gu5q/6luXV1srQ4ptY3oW', 'https://ui-avatars.com/api/?name=icyylucyy', '2024-06-06 06:39:24', '2024-06-06 06:39:24'),
	(6, 'igan2703', 'igan2703@gmail.com', '$2y$12$/idNGxofyGuTjhgIvfnwBekP20u0h7hUaNISshM1PLf0LvqSNU3Fq', 'images/users/picture/j8693RcbHNhFXSLr2SqGC26ZTVew25BDAVr837rh.jpg', '2024-06-19 19:56:23', '2024-06-19 20:00:03'),
	(7, 'anonymous', 'd2024y068@dicoding.org', '$2y$12$DvR2qgdgR3Q72jVravZIJeCpHXM2z3iphQgGPhrbBi86sDEYdjp.m', 'https://ui-avatars.com/api/?name=anonymous', '2024-06-20 22:44:25', '2024-06-20 22:44:25'),
	(8, 'vupizowip', 'bujiwyj@mailinator.com', '$2y$12$yKZ6TKEUAw9AkbrA4smppeFkJwIK6mUbA0biKIGNrZ5y5O0UlzKLW', 'https://ui-avatars.com/api/?name=vupizowip', '2024-06-30 01:50:21', '2024-06-30 01:50:21'),
	(9, 'lyluva', 'libedakiv@mailinator.com', '$2y$12$Hky/17AX8DUAAcU0eNrHyOWsGGTjCcSEZM99SBC38Vs.cworPCRDW', 'https://ui-avatars.com/api/?name=lyluva', '2024-06-30 01:51:39', '2024-06-30 01:51:39'),
	(10, 'zorani', 'lixydubo@mailinator.com', '$2y$12$22x6c552X.5MIeaZbtpnje8Uud9Z/fILpth4naB2xetPJehx047DW', 'https://ui-avatars.com/api/?name=zorani', '2024-06-30 01:52:22', '2024-06-30 01:52:22'),
	(11, 'ducis', 'tyji@mailinator.com', '$2y$12$f1YQWC5e.02hRsHSHAmXiult7uizyVRY1YgQfp69phnJSs9qWy3Rq', 'https://ui-avatars.com/api/?name=ducis', '2024-06-30 01:52:31', '2024-06-30 01:52:31'),
	(12, 'qofiko', 'cymybeses@mailinator.com', '$2y$12$5TC2Xvk6ikSg3p26Ca6OLOsdp1.9NPkwpsS5EyXlG0ebsBhKDSsHS', 'https://ui-avatars.com/api/?name=qofiko', '2024-06-30 01:52:49', '2024-06-30 01:52:49'),
	(13, 'jimocoruti', 'ciwudymi@mailinator.com', '$2y$12$ElB1a2uxLjZj0dkKYue0Xup9THbepOb9EIodplQvX1D3DZ338jOui', 'https://ui-avatars.com/api/?name=jimocoruti', '2024-06-30 01:53:46', '2024-06-30 01:53:46'),
	(14, 'laremycyci', 'xejyzas@mailinator.com', '$2y$12$vPt19NUd0mJprFnrphtb3uSvy8cYcrgMaaI6I9WqJkENHrgphQzI6', 'https://ui-avatars.com/api/?name=laremycyci', '2024-06-30 01:53:58', '2024-06-30 01:53:58'),
	(15, 'zytuhe', 'fodeqawyq@mailinator.com', '$2y$12$UT2mW9qHNy25xONP11m6sugfiw0/PKs4Z/3cNChHezKy65MnCTJTq', 'https://ui-avatars.com/api/?name=zytuhe', '2024-06-30 02:03:17', '2024-06-30 02:03:17'),
	(16, 'labidymiwy', 'bevyjoji@mailinator.com', '$2y$12$E4WRvgu7.CBZLgZT.du.Te08cx.usQHJP4sA/RowM3LI9WJpaAW1a', 'https://ui-avatars.com/api/?name=labidymiwy', '2024-06-30 02:05:06', '2024-06-30 02:05:06'),
	(17, 'mihisy', 'xudif@mailinator.com', '$2y$12$R4bTCCZCDwbFDsxS/1MmIO/tAD1jz6LUAM.L0pniUCjqDlUc51/g6', 'https://ui-avatars.com/api/?name=mihisy', '2024-06-30 02:05:14', '2024-06-30 02:05:14'),
	(18, 'wujyqog', 'fumykoxipa@mailinator.com', '$2y$12$xNNJag7vWpCQGqzF17Qld.pVF6VMzmi88bDecgnLppO9InAa2kfO.', 'https://ui-avatars.com/api/?name=wujyqog', '2024-06-30 02:06:13', '2024-06-30 02:06:13'),
	(19, 'kihageza', 'nanonox@mailinator.com', '$2y$12$FEsG9XwJQKx1XhKPRnte2.gVJ2oEkBWqsMioRYmWcC9lIXhog7KZ6', 'https://ui-avatars.com/api/?name=kihageza', '2024-06-30 02:06:31', '2024-06-30 02:06:31'),
	(20, 'hegimoz', 'sobocin@mailinator.com', '$2y$12$KY14OoZJllBoR8jrrhSop.yMIGs3L2Hx9sr4vaDW38KTw5WqOCeQe', 'images/users/picture/634OtMliD56fpzIPbeZEVazzbjJamhufmz18mwzP.png', '2024-06-30 02:07:10', '2024-06-30 02:07:57'),
	(21, 'jukyp', 'zobemyne@mailinator.com', '$2y$12$3IBpipO0jAl1JyErdy.8yONGTRuPrItd0wnK1uOqqufU/h.YvF72e', 'https://ui-avatars.com/api/?name=jukyp', '2024-06-30 02:08:06', '2024-06-30 02:08:06'),
	(22, 'vigoz', 'relyd@mailinator.com', '$2y$12$bgqQEeI79Z3qlQssk/EN6ewN64AxGYmfVFu5wQPytfdvgtwpxQJZW', 'https://ui-avatars.com/api/?name=vigoz', '2024-06-30 02:08:22', '2024-06-30 02:08:22'),
	(23, 'nofuwyduxy', 'hitocydaha@mailinator.com', '$2y$12$V9agjWa9y3LMMva8Zr.zRO0jdPTL7pFpkBxaiD.ZQNC3AtGWbxdRy', 'images/users/picture/8wAefOuoQVFnbwGQMEkAKAih1cUVdNwyZGeiVeLi.png', '2024-06-30 02:15:09', '2024-06-30 02:16:36'),
	(24, 'quxony', 'baxegokak@mailinator.com', '$2y$12$vFIvxInIPUoJXaWgOV3EceJ4tJJ6NcpcIfky3Lpltl4/SnsuRch7K', 'https://ui-avatars.com/api/?name=quxony', '2024-07-01 02:49:30', '2024-07-01 02:49:30'),
	(25, 'tuvycajy', 'vomym@mailinator.com', '$2y$12$Z7sQfKvOYofhJoiAC9L8VesB3E3vYtgn6z0A4kVaZoEkxi3psIOpK', 'https://ui-avatars.com/api/?name=tuvycajy', '2024-07-01 04:32:14', '2024-07-01 04:32:14'),
	(26, 'tewynub', 'jusyj@mailinator.com', '$2y$12$9SW.9t.9tYlIsjmCR.WS3.5SJrFmaCxBIV40WMmS3OhdOjkgB9Xx2', 'https://ui-avatars.com/api/?name=tewynub', '2024-07-01 04:33:47', '2024-07-01 04:33:47');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
