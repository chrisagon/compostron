var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// depots table
depots_addTip=["",spacer+"This option allows all members of the group to add records to the 'D&#233;p&#244;ts' table. A member who adds a record to the table becomes the 'owner' of that record."];

depots_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'D&#233;p&#244;ts' table."];
depots_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'D&#233;p&#244;ts' table."];
depots_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'D&#233;p&#244;ts' table."];
depots_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'D&#233;p&#244;ts' table."];

depots_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'D&#233;p&#244;ts' table."];
depots_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'D&#233;p&#244;ts' table."];
depots_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'D&#233;p&#244;ts' table."];
depots_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'D&#233;p&#244;ts' table, regardless of their owner."];

depots_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'D&#233;p&#244;ts' table."];
depots_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'D&#233;p&#244;ts' table."];
depots_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'D&#233;p&#244;ts' table."];
depots_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'D&#233;p&#244;ts' table."];

// site_compostage table
site_compostage_addTip=["",spacer+"This option allows all members of the group to add records to the 'Site compostage' table. A member who adds a record to the table becomes the 'owner' of that record."];

site_compostage_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Site compostage' table."];
site_compostage_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Site compostage' table."];
site_compostage_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Site compostage' table."];
site_compostage_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Site compostage' table."];

site_compostage_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Site compostage' table."];
site_compostage_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Site compostage' table."];
site_compostage_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Site compostage' table."];
site_compostage_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Site compostage' table, regardless of their owner."];

site_compostage_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Site compostage' table."];
site_compostage_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Site compostage' table."];
site_compostage_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Site compostage' table."];
site_compostage_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Site compostage' table."];

// bacs_du_site table
bacs_du_site_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bacs du site' table. A member who adds a record to the table becomes the 'owner' of that record."];

bacs_du_site_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bacs du site' table."];
bacs_du_site_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bacs du site' table."];
bacs_du_site_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bacs du site' table."];
bacs_du_site_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bacs du site' table."];

bacs_du_site_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bacs du site' table."];
bacs_du_site_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bacs du site' table."];
bacs_du_site_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bacs du site' table."];
bacs_du_site_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bacs du site' table, regardless of their owner."];

bacs_du_site_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bacs du site' table."];
bacs_du_site_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bacs du site' table."];
bacs_du_site_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bacs du site' table."];
bacs_du_site_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bacs du site' table."];

// membres table
membres_addTip=["",spacer+"This option allows all members of the group to add records to the 'Membres' table. A member who adds a record to the table becomes the 'owner' of that record."];

membres_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Membres' table."];
membres_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Membres' table."];
membres_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Membres' table."];
membres_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Membres' table."];

membres_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Membres' table."];
membres_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Membres' table."];
membres_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Membres' table."];
membres_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Membres' table, regardless of their owner."];

membres_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Membres' table."];
membres_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Membres' table."];
membres_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Membres' table."];
membres_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Membres' table."];

// transferts table
transferts_addTip=["",spacer+"This option allows all members of the group to add records to the 'Transferts' table. A member who adds a record to the table becomes the 'owner' of that record."];

transferts_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Transferts' table."];
transferts_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Transferts' table."];
transferts_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Transferts' table."];
transferts_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Transferts' table."];

transferts_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Transferts' table."];
transferts_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Transferts' table."];
transferts_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Transferts' table."];
transferts_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Transferts' table, regardless of their owner."];

transferts_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Transferts' table."];
transferts_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Transferts' table."];
transferts_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Transferts' table."];
transferts_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Transferts' table."];

// intervention table
intervention_addTip=["",spacer+"This option allows all members of the group to add records to the 'Intervention' table. A member who adds a record to the table becomes the 'owner' of that record."];

intervention_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Intervention' table."];
intervention_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Intervention' table."];
intervention_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Intervention' table."];
intervention_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Intervention' table."];

intervention_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Intervention' table."];
intervention_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Intervention' table."];
intervention_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Intervention' table."];
intervention_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Intervention' table, regardless of their owner."];

intervention_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Intervention' table."];
intervention_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Intervention' table."];
intervention_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Intervention' table."];
intervention_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Intervention' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
