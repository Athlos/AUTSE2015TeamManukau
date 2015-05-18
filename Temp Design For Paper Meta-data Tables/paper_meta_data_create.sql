-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2015-05-17 09:40:28.335




-- tables
-- Table ConfidenceRating
CREATE TABLE ConfidenceRating (
    confidence_level int    NOT NULL ,
    reason varchar(255)    NOT NULL ,
    rater varchar(100)    NOT NULL ,
    benefit varchar(255)    NOT NULL ,
    CONSTRAINT ConfidenceRating_pk PRIMARY KEY (confidence_level)
);

-- Table CredibilityRating
CREATE TABLE CredibilityRating (
    credibility_level int    NOT NULL ,
    reason varchar(255)    NOT NULL ,
    rater varchar(100)    NOT NULL ,
    bib_ref varchar(100)    NOT NULL ,
    CONSTRAINT CredibilityRating_pk PRIMARY KEY (credibility_level)
);

-- Table EvidenceItem
CREATE TABLE EvidenceItem (
    benefit varchar(255)    NOT NULL ,
    method varchar(25)    NOT NULL ,
    implementation varchar(255)    NOT NULL ,
    integrity varchar(100)    NOT NULL ,
    result varchar(255)    NOT NULL ,
    bib_ref varchar(100)    NOT NULL ,
    methodology_name varchar(25)    NOT NULL ,
    CONSTRAINT EvidenceItem_pk PRIMARY KEY (benefit)
);

-- Table EvidenceSource
CREATE TABLE EvidenceSource (
    bib_ref varchar(100)    NOT NULL ,
    research_level int    NOT NULL ,
    ResearchDesign_id int    NOT NULL ,
    CONSTRAINT EvidenceSource_pk PRIMARY KEY (bib_ref)
);

-- Table Method
CREATE TABLE Method (
    method_name varchar(25)    NOT NULL ,
    description varchar(255)    NOT NULL ,
    CONSTRAINT Method_pk PRIMARY KEY (method_name)
);

-- Table Methodology
CREATE TABLE Methodology (
    methodology_name varchar(25)    NOT NULL ,
    description varchar(255)    NOT NULL ,
    method_name varchar(25)    NOT NULL ,
    CONSTRAINT Methodology_pk PRIMARY KEY (methodology_name)
);

-- Table ResearchDesign
CREATE TABLE ResearchDesign (
    id int    NOT NULL ,
    question varchar(255)    NOT NULL ,
    method varchar(255)    NOT NULL ,
    metrics varchar(255)    NOT NULL ,
    participants varchar(255)    NOT NULL ,
    CONSTRAINT ResearchDesign_pk PRIMARY KEY (id)
);





-- foreign keys
-- Reference:  ConfidenceRating_EvidenceItem (table: ConfidenceRating)


ALTER TABLE ConfidenceRating ADD CONSTRAINT ConfidenceRating_EvidenceItem FOREIGN KEY ConfidenceRating_EvidenceItem (benefit)
    REFERENCES EvidenceItem (benefit);
-- Reference:  CredibilityRating_EvidenceSource (table: CredibilityRating)


ALTER TABLE CredibilityRating ADD CONSTRAINT CredibilityRating_EvidenceSource FOREIGN KEY CredibilityRating_EvidenceSource (bib_ref)
    REFERENCES EvidenceSource (bib_ref);
-- Reference:  EvidenceItem_EvidenceSource (table: EvidenceItem)


ALTER TABLE EvidenceItem ADD CONSTRAINT EvidenceItem_EvidenceSource FOREIGN KEY EvidenceItem_EvidenceSource (bib_ref)
    REFERENCES EvidenceSource (bib_ref);
-- Reference:  EvidenceItem_Methodology (table: EvidenceItem)


ALTER TABLE EvidenceItem ADD CONSTRAINT EvidenceItem_Methodology FOREIGN KEY EvidenceItem_Methodology (methodology_name)
    REFERENCES Methodology (methodology_name);
-- Reference:  EvidenceSource_ResearchDesign (table: EvidenceSource)


ALTER TABLE EvidenceSource ADD CONSTRAINT EvidenceSource_ResearchDesign FOREIGN KEY EvidenceSource_ResearchDesign (ResearchDesign_id)
    REFERENCES ResearchDesign (id);
-- Reference:  Methodology_Method (table: Methodology)


ALTER TABLE Methodology ADD CONSTRAINT Methodology_Method FOREIGN KEY Methodology_Method (method_name)
    REFERENCES Method (method_name);



-- End of file.

