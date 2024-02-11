<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Duplicate Records</title>
</head>
<body class="bg-gray-100">
	<nav class="bg-white border-gray-200 dark:bg-gray-900">
		<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
			<a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
				<img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
				<span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Sistem Verifikasi Internal </span>
			</a>
			<button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
			<span class="sr-only">Open main menu</span>
			<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
			</svg>
			</button>
			<div class="hidden w-full md:block md:w-auto" id="navbar-default">
				<ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
					<li>
						<a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Dashboard</a>
					</li>
					<li>
						<a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Koding</a>
					</li>
					<li>
						<a href="<?=base_url('admin/dashboard')?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kembali</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="bg-white p-10 border m-10">
		<h2 class="font-bold text-lg text-center mb-5">Daftar Terindikasi Double</h2>
		<?php if (!empty($duplicates)): ?>
		<div class="relative overflow-x-auto">
			<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
				<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
					<tr>
						<th class="px-6 py-3">NO</th>
						<th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">NOSEP</th>
						<th class="px-6 py-3">JENPEL</th>
						<th class="px-6 py-3">TGLSEP</th>
						<th class="px-6 py-3">TGLPULANG</th>
						<th class="px-6 py-3">NOKARTU</th>
						<th class="px-6 py-3">NMPESERTA</th>
						<th class="px-6 py-3">KETERANGAN</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1?>
					<?php foreach ($duplicates as $group): ?>
						<?php foreach ($group as $key => $row): ?>
							<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
								<td class="px-6 py-4"><?php echo $i++; ?></td>
								<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['A']; ?></td>
								<td class="px-6 py-4"><?php echo $row['B']; ?></td>
								<td class="px-6 py-4"><?php echo $row['C']; ?></td>
								<td class="px-6 py-4"><?php echo $row['D']; ?></td>
								<td class="px-6 py-4"><?php echo $row['E']; ?></td>
								<td class="px-6 py-4"><?php echo $row['F']; ?></td>
								<td class="px-6 py-4"><?php echo $row['G']; ?></td>
							</tr>
						<?php endforeach; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php else: ?>
			<p>No duplicate records found.</p>
		<?php endif; ?>
	</div>
</body>
</html>
