-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2025 pada 11.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `honix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bed_types`
--

CREATE TABLE `bed_types` (
  `bed_type_id` int(11) NOT NULL,
  `bed_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_methods`
--

CREATE TABLE `booking_methods` (
  `booking_method_id` int(11) NOT NULL,
  `method_name` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `check_in_status`
--

CREATE TABLE `check_in_status` (
  `check_in_status_id` int(11) NOT NULL,
  `check_in_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `check_out_status`
--

CREATE TABLE `check_out_status` (
  `check_out_status_id` int(11) NOT NULL,
  `check_out_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `password`, `phone_number`, `address`, `birthdate`, `gender`, `date_created`) VALUES
(1, 'Felix Richardo', 'ffelixrichardo@com', 'asdf', '0896049200030', 'asdfasdf', '2025-05-26', 'MALE', NULL),
(2, 'Angel', 'angel@com', 'asdf', '089604920040', 'asdfasdf address', '2025-05-26', 'FEMALE', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `extra_amenities`
--

CREATE TABLE `extra_amenities` (
  `extra_amenities_id` int(11) NOT NULL,
  `extra_amenities` varchar(100) NOT NULL,
  `price` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL,
  `payment_name` varchar(100) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `properties`
--

CREATE TABLE `properties` (
  `property_id` int(11) NOT NULL,
  `property` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `booking_method_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `isPaid` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation_details`
--

CREATE TABLE `reservation_details` (
  `reservation_details_id` int(11) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `check_in_status_id` int(11) NOT NULL,
  `actual_check_in_time` datetime DEFAULT NULL,
  `check_out_status_id` int(11) NOT NULL,
  `actual_check_out_time` datetime DEFAULT NULL,
  `reservation_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation_details_extra_amenities`
--

CREATE TABLE `reservation_details_extra_amenities` (
  `reservation_details_extra_amenities_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `extra_amenities_id` int(11) NOT NULL,
  `reservation_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `price_per_night` decimal(12,2) NOT NULL,
  `capacity_adult` int(11) NOT NULL,
  `capacity_children` int(11) NOT NULL,
  `bed_type_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `room_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_properties`
--

CREATE TABLE `room_properties` (
  `room_properties_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_status`
--

CREATE TABLE `room_status` (
  `room_status_id` int(11) NOT NULL,
  `room_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_types`
--

CREATE TABLE `room_types` (
  `room_type_id` int(11) NOT NULL,
  `room_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bed_types`
--
ALTER TABLE `bed_types`
  ADD PRIMARY KEY (`bed_type_id`);

--
-- Indeks untuk tabel `booking_methods`
--
ALTER TABLE `booking_methods`
  ADD PRIMARY KEY (`booking_method_id`);

--
-- Indeks untuk tabel `check_in_status`
--
ALTER TABLE `check_in_status`
  ADD PRIMARY KEY (`check_in_status_id`);

--
-- Indeks untuk tabel `check_out_status`
--
ALTER TABLE `check_out_status`
  ADD PRIMARY KEY (`check_out_status_id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `extra_amenities`
--
ALTER TABLE `extra_amenities`
  ADD PRIMARY KEY (`extra_amenities_id`);

--
-- Indeks untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indeks untuk tabel `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`);

--
-- Indeks untuk tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `FK_reservations_customers` (`customer_id`),
  ADD KEY `FK_reservations_booking_methods` (`booking_method_id`),
  ADD KEY `FK_reservations_payment_methods` (`payment_method_id`);

--
-- Indeks untuk tabel `reservation_details`
--
ALTER TABLE `reservation_details`
  ADD PRIMARY KEY (`reservation_details_id`),
  ADD KEY `FK_Reservation_Details_Check_In_Status` (`check_in_status_id`),
  ADD KEY `FK_Reservation_Details_Check_Out_Status` (`check_out_status_id`),
  ADD KEY `FK_Reservation_Details_Reservations` (`reservation_id`),
  ADD KEY `FK_Reservation_Details_Rooms` (`room_id`);

--
-- Indeks untuk tabel `reservation_details_extra_amenities`
--
ALTER TABLE `reservation_details_extra_amenities`
  ADD PRIMARY KEY (`reservation_details_extra_amenities_id`),
  ADD KEY `FK_RDEA_Extra_Amenities` (`extra_amenities_id`),
  ADD KEY `FK_RDEA_Reservation_Details` (`reservation_details_id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `FK_Rooms_Bed_Types` (`bed_type_id`),
  ADD KEY `FK_Rooms_Room_Types` (`room_type_id`),
  ADD KEY `FK_Rooms_Room_Status` (`room_status_id`);

--
-- Indeks untuk tabel `room_properties`
--
ALTER TABLE `room_properties`
  ADD PRIMARY KEY (`room_properties_id`),
  ADD KEY `FK_RP_Rooms` (`room_id`),
  ADD KEY `FK_RP_Properties` (`property_id`);

--
-- Indeks untuk tabel `room_status`
--
ALTER TABLE `room_status`
  ADD PRIMARY KEY (`room_status_id`);

--
-- Indeks untuk tabel `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`room_type_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bed_types`
--
ALTER TABLE `bed_types`
  MODIFY `bed_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `booking_methods`
--
ALTER TABLE `booking_methods`
  MODIFY `booking_method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `check_in_status`
--
ALTER TABLE `check_in_status`
  MODIFY `check_in_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `check_out_status`
--
ALTER TABLE `check_out_status`
  MODIFY `check_out_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `extra_amenities`
--
ALTER TABLE `extra_amenities`
  MODIFY `extra_amenities_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reservation_details`
--
ALTER TABLE `reservation_details`
  MODIFY `reservation_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reservation_details_extra_amenities`
--
ALTER TABLE `reservation_details_extra_amenities`
  MODIFY `reservation_details_extra_amenities_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `room_properties`
--
ALTER TABLE `room_properties`
  MODIFY `room_properties_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `room_status`
--
ALTER TABLE `room_status`
  MODIFY `room_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `room_types`
--
ALTER TABLE `room_types`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FK_reservations_booking_methods` FOREIGN KEY (`booking_method_id`) REFERENCES `booking_methods` (`booking_method_id`),
  ADD CONSTRAINT `FK_reservations_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `FK_reservations_payment_methods` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`payment_method_id`);

--
-- Ketidakleluasaan untuk tabel `reservation_details`
--
ALTER TABLE `reservation_details`
  ADD CONSTRAINT `FK_Reservation_Details_Check_In_Status` FOREIGN KEY (`check_in_status_id`) REFERENCES `check_in_status` (`check_in_status_id`),
  ADD CONSTRAINT `FK_Reservation_Details_Check_Out_Status` FOREIGN KEY (`check_out_status_id`) REFERENCES `check_out_status` (`check_out_status_id`),
  ADD CONSTRAINT `FK_Reservation_Details_Reservations` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`),
  ADD CONSTRAINT `FK_Reservation_Details_Rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Ketidakleluasaan untuk tabel `reservation_details_extra_amenities`
--
ALTER TABLE `reservation_details_extra_amenities`
  ADD CONSTRAINT `FK_RDEA_Extra_Amenities` FOREIGN KEY (`extra_amenities_id`) REFERENCES `extra_amenities` (`extra_amenities_id`),
  ADD CONSTRAINT `FK_RDEA_Reservation_Details` FOREIGN KEY (`reservation_details_id`) REFERENCES `reservation_details` (`reservation_details_id`);

--
-- Ketidakleluasaan untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `FK_Rooms_Bed_Types` FOREIGN KEY (`bed_type_id`) REFERENCES `bed_types` (`bed_type_id`),
  ADD CONSTRAINT `FK_Rooms_Room_Status` FOREIGN KEY (`room_status_id`) REFERENCES `room_status` (`room_status_id`),
  ADD CONSTRAINT `FK_Rooms_Room_Types` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`room_type_id`);

--
-- Ketidakleluasaan untuk tabel `room_properties`
--
ALTER TABLE `room_properties`
  ADD CONSTRAINT `FK_RP_Properties` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`),
  ADD CONSTRAINT `FK_RP_Rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
