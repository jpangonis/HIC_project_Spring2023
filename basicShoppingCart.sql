/*basic merch table*/

CREATE TABLE IF NOT EXISTS `merch` (
	`itemID` int(11) NOT NULL AUTO_INCREMENT,
	`itemName` varchar(200) NOT NULL,
	`itemDesc` text NOT NULL,
	`itemPrice` decimal(7,2) NOT NULL,
	`rrp` decimal(7,2) NOT NULL DEFAULT '0.00',
	`itemQuantity` int(11) NOT NULL,
	`itemImg` text NOT NULL,
	`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*insert function for merch*/

INSERT INTO `products` (`itemId`, `itemName`, `itemDesc`, `itemPrice`, `rrp`, `itemQuantity`, `itemImg`, `date_added`) VALUES
(1, 'Crewneck', '<p>Alliance Gaming Crewneck Sweatshirt</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>100% Cotton</li>\r\n<li>Cool Gaming Logo</li>\r\n<li>Available in S, M, L and XL</li>\r\n<li>Game in Style!</li>\r\n</ul>', '29.99', '0.00', 10, 'crewneck.png', 'CURRENT_TIMESTAMP'),
(2, 'Hoodie', '<p>Alliance Gaming Hoodie</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>100% Cotton</li>\r\n<li>Available in S, M, L and XL</li>\r\n<li>Represent Alliance Gaming</li>\r\n<li>Lightweight design, comfort while you game</li>\r\n</ul>', '45.99', '29.99', 34, 'hoodie.png', 'CURRENT_TIMESTAMP'),
(3, 'Jacket', '<p>Alliance Gaming Leather Jacket</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>Durable Design.</li>\r\n<li>Available in S, M, L and XL</li>\r\n<li>Interior Pockets</li>\r\n<li>Alliance Gaming Logo on Back</li>\r\n</ul>', '89.99', '0.00', 23, 'jacket.png', 'CURRENT_TIMESTAMP'),
(4, 'Longsleeve', '<p>Alliance Gaming Longsleeve</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>100% Cotton</li>\r\n<li>Available in S, M, L and XL</li>\r\n<li>Unique Logo</li>\r\n<li>Lightweight design, comfortable all year long</li>\r\n</ul>', '24.99', '0.00', 7, 'longsleeve.png', 'CURRENT_TIMESTAMP');
(5, 'Sweatpants', '<p>Alliance Gaming Sweatpants</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>Flexbile Elastic Waistband</li>\r\n<li>Available in S, M, L and XL</li>\r\n<li>100% Cotton</li>\r\n<li>Gaming Logo on Front</li>\r\n</ul>', '29.99', '0.00', 23, 'sweatpants.jpg', 'CURRENT_TIMESTAMP'),
(6, 'Tshirt', '<p>Alliance Gaming Competition TShirt</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>Official Alliance Gaming COmpetition TShirt</li>\r\n<li>Worn by the ESports Pros</li>\r\n<li>Polyester/Estane and Cotton Weave</li>\r\n<li>Game Like the Pros</li>\r\n</ul>', '19.99', '0.00', 23, 'tshirt.png', 'CURRENT_TIMESTAMP');