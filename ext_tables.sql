#
# Table structure for table 'tx_form4socialmedialinks_domain_model_link'
#
CREATE TABLE tx_form4socialmedialinks_domain_model_link (
    title varchar(255) DEFAULT '' NOT NULL,
    identifier varchar(255) DEFAULT '' NOT NULL,
    type int(11) DEFAULT '0' NOT NULL,
    url text,
    html text,
    icon int(11) unsigned NOT NULL default '0',
    social_media_icon varchar(255) DEFAULT '' NOT NULL,

    KEY identifier (identifier(191))
);
