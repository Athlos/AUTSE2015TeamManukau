<?php
	// if (!isset($_GET['modify_paper_name'])) {
	// 	$_GET['modify_paper_name'] = '';
	// }
	// if (isset($_GET['modify_paper_name'])) {
	// 	$modified_paper_name = $_GET['modify_paper_name'];
	// }

	// if (!isset($_GET['modify_paper_url'])) {
	// 	$_GET['modify_paper_url'] = '';
	// }
	// if (isset($_GET['modify_paper_url'])) {
	// 	$modified_paper_url = $_GET['modify_paper_url'];
	// }
	// ::::::::::::::::::::
	// ::Biblioraphy Info::
	// ::::::::::::::::::::
	// Paper Author
	if (!isset($_GET['modify_paper_author'])) {
		$_GET['modify_paper_author'] = '';
	}
	if (isset($_GET['modify_paper_author'])) {
		$modified_paper_author = $_GET['modify_paper_author'];
	}	

	// Paper Year
	if (!isset($_GET['modify_paper_year'])) {
		$_GET['modify_paper_year'] = '';
	}
	if (isset($_GET['modify_paper_year'])) {
		$modified_paper_year = $_GET['modify_paper_year'];
	}	

	// Paper Journal Name
	if (!isset($_GET['modify_paper_journal_name'])) {
		$_GET['modify_paper_journal_name'] = '';
	}
	if (isset($_GET['modify_paper_journal_name'])) {
		$modified_paper_journal_name = $_GET['modify_paper_journal_name'];
	}	


	// ::::::::::::::::::::::::::::
	// ::Evidence Source and Item::
	// ::::::::::::::::::::::::::::
	// Paper Evidence Source Research Level
	if (!isset($_GET['modify_paper_evidence_source_research_level'])) {
		$_GET['modify_paper_evidence_source_research_level'] = '';
	}
	if (isset($_GET['modify_paper_evidence_source_research_level'])) {
		$modified_paper_evidence_source_research_level = $_GET['modify_paper_evidence_source_research_level'];
	}
	// Paper Evidence Context
	if (!isset($_GET['modify_paper_evidence_context'])) {
		$_GET['modify_paper_evidence_context'] = '';
	}
	if (isset($_GET['modify_paper_evidence_context'])) {
		$modified_paper_evidence_context = $_GET['modify_paper_evidence_context'];
	}	
	// Paper Evidence Benefit Outcomes
	if (!isset($_GET['modify_paper_evidence_benefit_outcomes'])) {
		$_GET['modify_paper_evidence_benefit_outcomes'] = '';
	}
	if (isset($_GET['modify_paper_evidence_benefit_outcomes'])) {
		$modified_paper_evidence_benefit_outcomes = $_GET['modify_paper_evidence_benefit_outcomes'];
	}	
	// Paper Evidence Result
	if (!isset($_GET['modify_paper_evidence_result'])) {
		$_GET['modify_paper_evidence_result'] = '';
	}
	if (isset($_GET['modify_paper_evidence_result'])) {
		$modified_paper_evidence_result = $_GET['modify_paper_evidence_result'];
	}	
	// Paper Evidence Method Implementation Integrity
	if (!isset($_GET['modify_paper_evidence_method_implemention_integrity'])) {
		$_GET['modify_paper_evidence_method_implemention_integrity'] = '';
	}
	if (isset($_GET['modify_paper_evidence_method_implemention_integrity'])) {
		$modified_paper_evidence_method_implemention_integrity = $_GET['modify_paper_evidence_method_implemention_integrity'];
	}
	// ::::::::::::::::::::::::::
	// ::Methodology and Method::
	// ::::::::::::::::::::::::::
	// Paper Methodology Name
	if (!isset($_GET['modify_paper_methodology_name'])) {
		$_GET['modify_paper_methodology_name'] = '';
	}
	if (isset($_GET['modify_paper_methodology_name'])) {
		$modified_paper_methodology_name = $_GET['modify_paper_methodology_name'];
	}	
	// Paper Methodology Description
	if (!isset($_GET['modify_paper_methodology_description'])) {
		$_GET['modify_paper_methodology_description'] = '';
	}
	if (isset($_GET['modify_paper_methodology_description'])) {
		$modified_paper_methodology_description = $_GET['modify_paper_methodology_description'];
	}		
	// Paper Method Name
	if (!isset($_GET['modify_paper_method_name'])) {
		$_GET['modify_paper_method_name'] = '';
	}
	if (isset($_GET['modify_paper_method_name'])) {
		$modified_paper_method_name = $_GET['modify_paper_method_name'];
	}		
	// Paper Method Description
	if (!isset($_GET['modify_paper_method_description'])) {
		$_GET['modify_paper_method_description'] = '';
	}
	if (isset($_GET['modify_paper_method_description'])) {
		$modified_paper_method_description = $_GET['modify_paper_method_description'];
	}		

	// ::::::::::::::::
	// ::Paper Rating::
	// ::::::::::::::::
	// Paper Date
	if (!isset($_GET['modify_paper_rating_date'])) {
		$_GET['modify_paper_rating_date'] = '';
	}
	if (isset($_GET['modify_paper_rating_date'])) {
		$modified_paper_rating_date = $_GET['modify_paper_rating_date'];
	}	
	// Paper Credibility Level
	if (!isset($_GET['modify_paper_credibility_level'])) {
		$_GET['modify_paper_credibility_level'] = '';
	}
	if (isset($_GET['modify_paper_credibility_level'])) {
		$modified_paper_credibility_level = $_GET['modify_paper_credibility_level'];
	}		
	// Paper Credibility Reason
	if (!isset($_GET['modify_paper_credibility_reason'])) {
		$_GET['modify_paper_credibility_reason'] = '';
	}
	if (isset($_GET['modify_paper_credibility_reason'])) {
		$modified_paper_credibility_reason = $_GET['modify_paper_credibility_reason'];
	}			
	// Paper Confidence Level
	if (!isset($_GET['modify_paper_confidence_level'])) {
		$_GET['modify_paper_confidence_level'] = '';
	}
	if (isset($_GET['modify_paper_confidence_level'])) {
		$modified_paper_confidence_level = $_GET['modify_paper_confidence_level'];
	}
	// Paper Confidence Reason
	if (!isset($_GET['modify_paper_confidence_reason'])) {
		$_GET['modify_paper_confidence_reason'] = '';
	}
	if (isset($_GET['modify_paper_confidence_reason'])) {
		$modified_paper_confidence_reason = $_GET['modify_paper_confidence_reason'];
	}
	// Paper Rater
	if (!isset($_GET['modify_rater'])) {
		$_GET['modify_rater'] = '';
	}
	if (isset($_GET['modify_rater'])) {
		$modified_rater = $_GET['modify_rater'];
	}
	// Paper Average Credibility
	if (!isset($_GET['modify_paper_average_credibility'])) {
		$_GET['modify_paper_average_credibility'] = '';
	}
	if (isset($_GET['modify_paper_average_credibility'])) {
		$modified_paper_average_credibility = $_GET['modify_paper_average_credibility'];
	}	
	// Paper Average Confidence
	if (!isset($_GET['modify_paper_average_confidence'])) {
		$_GET['modify_paper_average_confidence'] = '';
	}
	if (isset($_GET['modify_paper_average_confidence'])) {
		$modified_paper_average_confidence = $_GET['modify_paper_average_confidence'];
	}	
	// ::::::::::::::::::: 
	// ::Paper Reseaerch::
	// ::::::::::::::::::: 
	// Paper Research Question
	if (!isset($_GET['modify_paper_research_question'])) {
		$_GET['modify_paper_research_question'] = '';
	}
	if (isset($_GET['modify_paper_research_question'])) {
		$modified_paper_research_question = $_GET['modify_paper_research_question'];
	}
	// Paper Research Method
	if (!isset($_GET['modify_paper_research_method'])) {
		$_GET['modify_paper_research_method'] = '';
	}
	if (isset($_GET['modify_paper_research_method'])) {
		$modified_paper_research_method = $_GET['modify_paper_research_method'];
	}	
	// Paper Research Metrics
	if (!isset($_GET['modify_paper_research_metrics'])) {
		$_GET['modify_paper_research_metrics'] = '';
	}
	if (isset($_GET['modify_paper_research_metrics'])) {
		$modified_paper_research_metrics = $_GET['modify_paper_research_metrics'];
	}		
	// Paper Research Metrics
	if (!isset($_GET['modify_paper_research_participants'])) {
		$_GET['modify_paper_research_participants'] = '';
	}
	if (isset($_GET['modify_paper_research_participants'])) {
		$modified_paper_research_participants = $_GET['modify_paper_research_participants'];
	}		
?>