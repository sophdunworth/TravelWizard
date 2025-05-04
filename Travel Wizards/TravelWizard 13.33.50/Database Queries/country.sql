-- Europe
UPDATE destinations SET continent = 'Europe' WHERE destinationID IN (1, 2, 3, 4, 5, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 41, 42, 43, 44,
45, 46, 47, 48, 49, 50, 51, 52, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118);

-- Africa
UPDATE destinations SET continent = 'Africa' WHERE destinationID IN (6, 7, 38, 39, 40);

-- Asia
UPDATE destinations SET continent = 'Asia' WHERE destinationID IN (8, 9, 29, 30, 31, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66);

-- South America
UPDATE destinations SET continent = 'South America' WHERE destinationID IN (21, 22, 23, 24, 25, 26, 27);

-- Caribbean
UPDATE destinations SET continent = 'Caribbean' WHERE destinationID IN (96, 97, 98, 99, 100, 101, 102, 103, 104);

-- Oceania
UPDATE destinations SET continent = 'Oceania' WHERE destinationID IN (32, 33, 34, 35, 36, 37, 86, 87, 88, 89);

-- North America
UPDATE destinations SET continent = 'North America' WHERE destinationID IN (28, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84,
85, 90, 91, 92, 93, 94, 95);

ALTER TABLE destinations
ADD COLUMN country VARCHAR(100);

UPDATE destinations SET country = 'Greece' WHERE destinationID IN (1, 2, 3, 4, 5, 116, 117, 118);

UPDATE destinations SET country = 'Seychelles' WHERE destinationID = 6;

UPDATE destinations SET country = 'Mauritius' WHERE destinationID = 7;

UPDATE destinations SET country = 'Sri Lanka' WHERE destinationID = 8;

UPDATE destinations SET country = 'Norway' WHERE destinationID = 42;

UPDATE destinations SET country = 'Maldives' WHERE destinationID = 9;

UPDATE destinations SET country = 'France' WHERE destinationID IN (10, 11, 12, 13);

UPDATE destinations SET country = 'Monaco' WHERE destinationID = 14;

UPDATE destinations SET country = 'Spain' WHERE destinationID IN (15, 16, 17, 18, 19, 20);

UPDATE destinations SET country = 'Colombia' WHERE destinationID = 21;

UPDATE destinations SET country = 'Venezuela' WHERE destinationID = 22;

UPDATE destinations SET country = 'Brazil' WHERE destinationID = 23;

UPDATE destinations SET country = 'Peru' WHERE destinationID = 25;

UPDATE destinations SET country = 'Argentina' WHERE destinationID = 24;

UPDATE destinations SET country = 'Panama' WHERE destinationID = 26;

UPDATE destinations SET country = 'Costa Rica' WHERE destinationID = 27;

UPDATE destinations SET country = 'Mexico' WHERE destinationID = 28;

UPDATE destinations SET country = 'United Arab Emirates' WHERE destinationID IN (29, 30);

UPDATE destinations SET country = 'Qatar' WHERE destinationID = 31;

UPDATE destinations SET country = 'Australia' WHERE destinationID IN (32, 33, 34);

UPDATE destinations SET country = 'New Zealand' WHERE destinationID IN (35, 36, 37);

UPDATE destinations SET country = 'South Africa' WHERE destinationID IN (38, 39, 40);

UPDATE destinations SET country = 'Sweden' WHERE destinationID = 41;

UPDATE destinations SET country = 'Denmark' WHERE destinationID = 43;

UPDATE destinations SET country = 'Finland' WHERE destinationID = 44;

UPDATE destinations SET country = 'Netherlands' WHERE destinationID = 45;

UPDATE destinations SET country = 'Belgium' WHERE destinationID = 46;

UPDATE destinations SET country = 'Germany' WHERE destinationID = 47;

UPDATE destinations SET country = 'Czech Republic' WHERE destinationID = 48;

UPDATE destinations SET country = 'Austria' WHERE destinationID = 49;

UPDATE destinations SET country = 'Switzerland' WHERE destinationID IN (50, 51, 52);

UPDATE destinations SET country = 'Thailand' WHERE destinationID IN (53, 54);

UPDATE destinations SET country = 'Vietnam' WHERE destinationID IN (55, 56);

UPDATE destinations SET country = 'Malaysia' WHERE destinationID = 57;

UPDATE destinations SET country = 'Indonesia' WHERE destinationID IN (58, 59);

UPDATE destinations SET country = 'South Korea' WHERE destinationID = 60;

UPDATE destinations SET country = 'Japan' WHERE destinationID = 61;

UPDATE destinations SET country = 'China' WHERE destinationID = 62;

UPDATE destinations SET country = 'Hong Kong' WHERE destinationID = 63;

UPDATE destinations SET country = 'Taiwan' WHERE destinationID = 64;

UPDATE destinations SET country = 'Philippines' WHERE destinationID IN (65, 66);

UPDATE destinations SET country = 'Canada' WHERE destinationID IN (67, 68);

UPDATE destinations SET country = 'United States' WHERE destinationID IN (69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 91, 92, 93, 94, 95);

UPDATE destinations SET country = 'French Polynesia' WHERE destinationID IN (86, 87);

UPDATE destinations SET country = 'United States' WHERE destinationID IN (88, 89);

UPDATE destinations SET country = 'Canada' WHERE destinationID = 90;

UPDATE destinations SET country = 'Jamaica' WHERE destinationID = 96;

UPDATE destinations SET country = 'Cuba' WHERE destinationID = 97;

UPDATE destinations SET country = 'Puerto Rico' WHERE destinationID = 98;

UPDATE destinations SET country = 'Dominican Republic' WHERE destinationID = 99;

UPDATE destinations SET country = 'Turks and Caicos Islands' WHERE destinationID = 100;

UPDATE destinations SET country = 'Bahamas' WHERE destinationID = 101;

UPDATE destinations SET country = 'Saint Lucia' WHERE destinationID = 102;

UPDATE destinations SET country = 'Barbados' WHERE destinationID = 103;

UPDATE destinations SET country = 'Trinidad and Tobago' WHERE destinationID = 104;

UPDATE destinations SET country = 'Italy' WHERE destinationID IN (105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115);

UPDATE destinations SET country = 'Norway' WHERE destinationID = 42;

UPDATE destinations SET country = 'Peru' WHERE destinationID = 25;












