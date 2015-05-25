<?php
	if (!isset($_GET['modify_paper_name'])) {
		$_GET['modify_paper_name'] = '';
	}
	if (isset($_GET['modify_paper_name'])) {
		$modified_paper_name = $_GET['modify_paper_name'];
	}

	if (!isset($_GET['modify_paper_url'])) {
		$_GET['modify_paper_url'] = '';
	}
	if (isset($_GET['modify_paper_url'])) {
		$modified_paper_url = $_GET['modify_paper_url'];
	}
	// 
	// Modify Credibility and Confidence Ratings Variables
	if (!isset($_GET['modify_cred_level'])) {
		$_GET['modify_cred_level'] = '';
	}
	if (isset($_GET['modify_cred_level'])) {
		$modified_cred_level = $_GET['modify_cred_level'];
	}

	if (!isset($_GET['modify_cred_reason'])) {
		$_GET['modify_cred_reason'] = '';
	}
	if (isset($_GET['modify_cred_reason'])) {
		$modified_cred_reason = $_GET['modify_cred_reason'];
	}
	if (!isset($_GET['modify_cred_rater'])) {
		$_GET['modify_cred_rater'] = '';
	}
	if (isset($_GET['modify_cred_rater'])) {
		$modified_cred_rater = $_GET['modify_cred_rater'];
	}

	if (!isset($_GET['modify_conf_level'])) {
		$_GET['modify_conf_level'] = '';
	}
	if (isset($_GET['modify_conf_level'])) {
		$modified_conf_level = $_GET['modify_conf_level'];
	}
	if (!isset($_GET['modify_conf_reason'])) {
		$_GET['modify_conf_reason'] = '';
	}
	if (isset($_GET['modify_conf_reason'])) {
		$modified_conf_reason = $_GET['modify_conf_reason'];
	}

	if (!isset($_GET['modify_conf_rater'])) {
		$_GET['modify_conf_rater'] = '';
	}
	if (isset($_GET['modify_conf_rater'])) {
		$modified_conf_rater = $_GET['modify_conf_rater'];
	}	
	// 
	// Paper Evidence Source and Item
	if (!isset($_GET['modify_src_bib_ref'])) {
		$_GET['modify_src_bib_ref'] = '';
	}
	if (isset($_GET['modify_src_bib_ref'])) {
		$modified_src_bib_ref = $_GET['modify_src_bib_ref'];
	}

	if (!isset($_GET['modify_src_research_lvl'])) {
		$_GET['modify_src_research_lvl'] = '';
	}
	if (isset($_GET['modify_src_research_lvl'])) {
		$modified_src_research_lvl = $_GET['modify_src_research_lvl'];
	}
	if (!isset($_GET['modify_evidence_context'])) {
		$_GET['modify_evidence_context'] = '';
	}
	if (isset($_GET['modify_evidence_context'])) {
		$modified_evidence_context = $_GET['modify_evidence_context'];
	}

	if (!isset($_GET['modify_evidence_outcomes'])) {
		$_GET['modify_evidence_outcomes'] = '';
	}
	if (isset($_GET['modify_evidence_outcomes'])) {
		$modified_evidence_outcomes = $_GET['modify_evidence_outcomes'];
	}
	if (!isset($_GET['modify_evidence_result'])) {
		$_GET['modify_evidence_result'] = '';
	}
	if (isset($_GET['modify_evidence_result'])) {
		$modified_evidence_result = $_GET['modify_evidence_result'];
	}

	if (!isset($_GET['modify_evidence_meth_imp_integrity'])) {
		$_GET['modify_evidence_meth_imp_integrity'] = '';
	}
	if (isset($_GET['modify_evidence_meth_imp_integrity'])) {
		$modified_evidence_meth_imp_integrity = $_GET['modify_evidence_meth_imp_integrity'];
	}		
	// 
	// Paer Methodology and Method Name
	if (!isset($_GET['modify_methodology_name'])) {
		$_GET['modify_methodology_name'] = '';
	}
	if (isset($_GET['modify_methodology_name'])) {
		$modified_methodology_name = $_GET['modify_methodology_name'];
	}

	if (!isset($_GET['modify_methodology_desc'])) {
		$_GET['modify_methodology_desc'] = '';
	}
	if (isset($_GET['modify_methodology_desc'])) {
		$modified_methodology_desc = $_GET['modify_methodology_desc'];
	}
	if (!isset($_GET['modify_method_name'])) {
		$_GET['modify_method_name'] = '';
	}
	if (isset($_GET['modify_method_name'])) {
		$modified_method_name = $_GET['modify_method_name'];
	}

	if (!isset($_GET['modify_method_desc'])) {
		$_GET['modify_method_desc'] = '';
	}
	if (isset($_GET['modify_method_desc'])) {
		$modified_method_desc = $_GET['modify_method_desc'];
	}
	// 
	// Paer Research Variables
	if (!isset($_GET['modify_research_q'])) {
		$_GET['modify_research_q'] = '';
	}
	if (isset($_GET['modify_research_q'])) {
		$modified_research_q = $_GET['modify_research_q'];
	}

	if (!isset($_GET['modify_research_meth'])) {
		$_GET['modify_research_meth'] = '';
	}
	if (isset($_GET['modify_research_meth'])) {
		$modified_research_meth = $_GET['modify_research_meth'];
	}
	if (!isset($_GET['modify_research_metrics'])) {
		$_GET['modify_research_metrics'] = '';
	}
	if (isset($_GET['modify_research_metrics'])) {
		$modified_research_metrics = $_GET['modify_research_metrics'];
	}

	if (!isset($_GET['modify_research_participants'])) {
		$_GET['modify_research_participants'] = '';
	}
	if (isset($_GET['modify_research_participants'])) {
		$modified_research_participants = $_GET['modify_research_participants'];
	}
?>

