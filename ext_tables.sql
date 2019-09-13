#
# Table structure for table 'pages'
#
CREATE TABLE pages (
	tx_microportals_portalicon VARCHAR(255) DEFAULT '' NOT NULL,
	tx_microportals_portalimage TEXT,
	tx_microportals_portalteaser TEXT,
	tx_microportals_title_override VARCHAR(255) DEFAULT '' NOT NULL
);

CREATE TABLE tt_content (
	tx_microportals_enable_zoom tinyint(3) DEFAULT '1' NOT NULL,
);