SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`AccountId`),
  ADD UNIQUE KEY `AccountEmail` (`AccountEmail`),
  ADD KEY `AccountEmail_2` (`AccountEmail`);

--
-- Indices de la tabla `Activity`
--
ALTER TABLE `Activity`
  ADD PRIMARY KEY (`ActivityId`);

--
-- Indices de la tabla `Answer`
--
ALTER TABLE `Answer`
  ADD PRIMARY KEY (`AnswerId`),
  ADD KEY `QuestionId` (`QuestionId`);

--
-- Indices de la tabla `Block`
--
ALTER TABLE `Block`
  ADD PRIMARY KEY (`BlockId`),
  ADD KEY `TermId` (`TermId`);

--
-- Indices de la tabla `Content`
--
ALTER TABLE `Content`
  ADD PRIMARY KEY (`ContentId`),
  ADD KEY `SubjectCourseId` (`SubjectCourseId`);

--
-- Indices de la tabla `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`CourseId`),
  ADD KEY `SectionId` (`SectionId`);

--
-- Indices de la tabla `CourseCatalog`
--
ALTER TABLE `CourseCatalog`
  ADD PRIMARY KEY (`CourseCatalogId`);

--
-- Indices de la tabla `datatables_demo`
--
ALTER TABLE `datatables_demo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seq` (`seq`);

--
-- Indices de la tabla `Discount`
--
ALTER TABLE `Discount`
  ADD PRIMARY KEY (`DiscountId`);

--
-- Indices de la tabla `EditorialResource`
--
ALTER TABLE `EditorialResource`
  ADD PRIMARY KEY (`EditorialResourceId`),
  ADD KEY `ResourceCategoryId` (`ResourceCategoryId`),
  ADD KEY `CourseId` (`CourseId`);

--
-- Indices de la tabla `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`EventId`),
  ADD KEY `ParallelId` (`ParallelId`);

--
-- Indices de la tabla `Exam`
--
ALTER TABLE `Exam`
  ADD PRIMARY KEY (`ExamId`),
  ADD KEY `TermId` (`TermId`);

--
-- Indices de la tabla `ExamDetail`
--
ALTER TABLE `ExamDetail`
  ADD PRIMARY KEY (`ExamDetailId`),
  ADD KEY `SCExamId` (`SCExamId`);

--
-- Indices de la tabla `Fault`
--
ALTER TABLE `Fault`
  ADD PRIMARY KEY (`FaultId`),
  ADD KEY `SCUPId` (`SCUPId`);

--
-- Indices de la tabla `FaultTakenDaily`
--
ALTER TABLE `FaultTakenDaily`
  ADD PRIMARY KEY (`FaultTakenDailyId`),
  ADD KEY `SubjectCourseId` (`SubjectCourseId`),
  ADD KEY `ParallelId` (`ParallelId`);

--
-- Indices de la tabla `FaultTemporary`
--
ALTER TABLE `FaultTemporary`
  ADD PRIMARY KEY (`FaultTemporaryId`);

--
-- Indices de la tabla `File`
--
ALTER TABLE `File`
  ADD PRIMARY KEY (`idFile`),
  ADD KEY `TABLEREFERENCE` (`tableReference`),
  ADD KEY `TABLEPARENT` (`idParent`),
  ADD KEY `ALIAS` (`alias`);

--
-- Indices de la tabla `ImprovementPlan`
--
ALTER TABLE `ImprovementPlan`
  ADD PRIMARY KEY (`ImprovementPlanId`),
  ADD KEY `FK_UP_IP` (`UserParallelId`);

--
-- Indices de la tabla `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`MessageId`),
  ADD KEY `MessageReceiver` (`MessageReceiver`),
  ADD KEY `MessageSender` (`MessageSender`),
  ADD KEY `MessageRead` (`MessageRead`),
  ADD KEY `MessageType` (`MessageId`);

--
-- Indices de la tabla `Module`
--
ALTER TABLE `Module`
  ADD PRIMARY KEY (`ModuleId`);

--
-- Indices de la tabla `MTD_Answer`
--
ALTER TABLE `MTD_Answer`
  ADD PRIMARY KEY (`MTDAnswerId`),
  ADD KEY `MTDQuestionId` (`MTDQuestionId`);

--
-- Indices de la tabla `MTD_Assignment`
--
ALTER TABLE `MTD_Assignment`
  ADD PRIMARY KEY (`MTDAssignmentId`),
  ADD KEY `UserParallerId` (`UserParallerId`),
  ADD KEY `MTDQuizId` (`MTDQuizId`);

--
-- Indices de la tabla `MTD_Assignment_User`
--
ALTER TABLE `MTD_Assignment_User`
  ADD PRIMARY KEY (`MTDAssignmentUserId`),
  ADD KEY `MTDAssignmentId` (`MTDAssignmentId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indices de la tabla `MTD_Book`
--
ALTER TABLE `MTD_Book`
  ADD PRIMARY KEY (`MTDBookId`),
  ADD KEY `SubjectCourseId` (`SubjectCourseId`);

--
-- Indices de la tabla `MTD_Question`
--
ALTER TABLE `MTD_Question`
  ADD PRIMARY KEY (`MTDQuestionId`),
  ADD KEY `MTDQuizId` (`MTDQuizId`);

--
-- Indices de la tabla `MTD_Quiz`
--
ALTER TABLE `MTD_Quiz`
  ADD PRIMARY KEY (`MTDQuizId`),
  ADD KEY `SubjectCourseId` (`SubjectCourseId`);

--
-- Indices de la tabla `Notification`
--
ALTER TABLE `Notification`
  ADD PRIMARY KEY (`NotificationId`),
  ADD KEY `NotificationUserId` (`NotificationUserId`) USING BTREE,
  ADD KEY `NotificationParent` (`NotificationParent`) USING BTREE,
  ADD KEY `NotificationType` (`NotificationType`(768)) USING BTREE;

--
-- Indices de la tabla `Options`
--
ALTER TABLE `Options`
  ADD PRIMARY KEY (`OptionId`),
  ADD KEY `ModuleId` (`ModuleId`);

--
-- Indices de la tabla `Parallel`
--
ALTER TABLE `Parallel`
  ADD PRIMARY KEY (`ParallelId`),
  ADD KEY `CourseId` (`CourseId`);

--
-- Indices de la tabla `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`QuestionId`),
  ADD KEY `QuizId` (`QuizId`);

--
-- Indices de la tabla `Quiz`
--
ALTER TABLE `Quiz`
  ADD PRIMARY KEY (`QuizId`);

--
-- Indices de la tabla `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`ReportId`);

--
-- Indices de la tabla `ResourceCategory`
--
ALTER TABLE `ResourceCategory`
  ADD PRIMARY KEY (`ResourceCategoryId`);

--
-- Indices de la tabla `ResponseSupplyDetail`
--
ALTER TABLE `ResponseSupplyDetail`
  ADD PRIMARY KEY (`ResponseSupplyDetailId`),
  ADD KEY `ResponseSupplyDetail_ibfk_1` (`SupplyDetailId`),
  ADD KEY `ResponseSupplyDetail_ibfk_2` (`SubjectCourseUserParallelId`);

--
-- Indices de la tabla `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indices de la tabla `Role_Module`
--
ALTER TABLE `Role_Module`
  ADD PRIMARY KEY (`RoleModuleId`),
  ADD KEY `RoleId` (`RoleId`),
  ADD KEY `ModuleId` (`ModuleId`);

--
-- Indices de la tabla `School`
--
ALTER TABLE `School`
  ADD PRIMARY KEY (`SchoolId`),
  ADD KEY `AccountId` (`AccountId`);

--
-- Indices de la tabla `SCUP_ExamDetail`
--
ALTER TABLE `SCUP_ExamDetail`
  ADD PRIMARY KEY (`SCUPExamDetailId`),
  ADD KEY `SubjectCourseUserParallelId` (`SubjectCourseUserParallelId`),
  ADD KEY `ExamDetailId` (`ExamDetailId`);

--
-- Indices de la tabla `SCUP_SD_QT_Answer`
--
ALTER TABLE `SCUP_SD_QT_Answer`
  ADD PRIMARY KEY (`SCUP_SD_QT_AnswerId`),
  ADD KEY `SCUP_SD_QuizTimeId` (`SCUP_SD_QuizTimeId`),
  ADD KEY `AnswerId` (`AnswerId`);

--
-- Indices de la tabla `SCUP_SD_QuizTime`
--
ALTER TABLE `SCUP_SD_QuizTime`
  ADD PRIMARY KEY (`SCUP_SD_QuizTimeId`),
  ADD KEY `SCUPSupplyDetailId` (`SCUPSupplyDetailId`);

--
-- Indices de la tabla `SCUP_Suppletory`
--
ALTER TABLE `SCUP_Suppletory`
  ADD PRIMARY KEY (`SCUPSuppletoryDetailId`),
  ADD KEY `SubjectCourseUserParallelId` (`SubjectCourseUserParallelId`),
  ADD KEY `SuppletoryDetailId` (`SuppletoryDetailId`);

--
-- Indices de la tabla `SCUP_SupplyDetail`
--
ALTER TABLE `SCUP_SupplyDetail`
  ADD PRIMARY KEY (`SCUPSupplyDetailId`),
  ADD KEY `SubjectCourseUserParallelId` (`SubjectCourseUserParallelId`),
  ADD KEY `SupplyDetailId` (`SupplyDetailId`),
  ADD KEY `PendingActivityChecked` (`PendingActivityChecked`),
  ADD KEY `GradeChecked` (`GradeChecked`);

--
-- Indices de la tabla `SC_Exam`
--
ALTER TABLE `SC_Exam`
  ADD PRIMARY KEY (`SCExamId`),
  ADD KEY `SubjectCourseId` (`SubjectCourseId`),
  ADD KEY `ExamId` (`ExamId`);

--
-- Indices de la tabla `SC_Suppletory`
--
ALTER TABLE `SC_Suppletory`
  ADD PRIMARY KEY (`SCSuppletoryId`),
  ADD KEY `SubjectCourseId` (`SubjectCourseId`),
  ADD KEY `SuppletoryId` (`SuppletoryId`);

--
-- Indices de la tabla `SC_Supply`
--
ALTER TABLE `SC_Supply`
  ADD PRIMARY KEY (`SCSupplyId`),
  ADD KEY `SubjectCourseId` (`SubjectCourseId`),
  ADD KEY `SupplyId` (`SupplyId`);

--
-- Indices de la tabla `Section`
--
ALTER TABLE `Section`
  ADD PRIMARY KEY (`SectionId`),
  ADD KEY `SchoolId` (`SchoolId`);

--
-- Indices de la tabla `SectionCatalog`
--
ALTER TABLE `SectionCatalog`
  ADD PRIMARY KEY (`SectionCatalogId`);

--
-- Indices de la tabla `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id_sign`),
  ADD KEY `signature_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `StudentAgent`
--
ALTER TABLE `StudentAgent`
  ADD PRIMARY KEY (`StudentAgentId`),
  ADD KEY `StudentName` (`StudentName`) USING BTREE;

--
-- Indices de la tabla `Subject`
--
ALTER TABLE `Subject`
  ADD PRIMARY KEY (`SubjectId`),
  ADD KEY `SchoolId` (`SchoolId`);

--
-- Indices de la tabla `SubjectCourse_UserParallel`
--
ALTER TABLE `SubjectCourse_UserParallel`
  ADD PRIMARY KEY (`SubjectCourseUserParallelId`),
  ADD KEY `SubjectCourseId` (`SubjectCourseId`),
  ADD KEY `UserParallelId` (`UserParallelId`);

--
-- Indices de la tabla `Subject_Course`
--
ALTER TABLE `Subject_Course`
  ADD PRIMARY KEY (`SubjectCourseId`),
  ADD KEY `SubjectId` (`SubjectId`,`CourseId`),
  ADD KEY `CourseId` (`CourseId`);

--
-- Indices de la tabla `Suppletory`
--
ALTER TABLE `Suppletory`
  ADD PRIMARY KEY (`SuppletoryId`),
  ADD KEY `ParallelId` (`ParallelId`);

--
-- Indices de la tabla `SuppletoryDetail`
--
ALTER TABLE `SuppletoryDetail`
  ADD PRIMARY KEY (`SuppletoryDetailId`),
  ADD KEY `SCSuppletoryId` (`SCSuppletoryId`);

--
-- Indices de la tabla `Supply`
--
ALTER TABLE `Supply`
  ADD PRIMARY KEY (`SupplyId`),
  ADD KEY `BlockId` (`BlockId`),
  ADD KEY `ActivityId` (`ActivityId`),
  ADD KEY `SupplyName` (`SupplyName`);

--
-- Indices de la tabla `SupplyDetail`
--
ALTER TABLE `SupplyDetail`
  ADD PRIMARY KEY (`SupplyDetailId`),
  ADD KEY `SCSupplyId` (`SCSupplyId`),
  ADD KEY `SupplyDetailStatus` (`SupplyDetailStatus`),
  ADD KEY `SupplyDetailDateLimit` (`SupplyDetailDateLimit`);

--
-- Indices de la tabla `SupplyDetail_Quiz`
--
ALTER TABLE `SupplyDetail_Quiz`
  ADD PRIMARY KEY (`SupplyDetailQuizId`),
  ADD KEY `SupplyDetailId` (`SupplyDetailId`),
  ADD KEY `QuizId` (`QuizId`);

--
-- Indices de la tabla `TeacherResource`
--
ALTER TABLE `TeacherResource`
  ADD PRIMARY KEY (`TeacherResourceId`),
  ADD KEY `SubjectCourseId` (`SubjectCourseId`),
  ADD KEY `ParallelId` (`UserParallelId`),
  ADD KEY `ResourceCategoryId` (`ResourceCategoryId`);

--
-- Indices de la tabla `Term`
--
ALTER TABLE `Term`
  ADD PRIMARY KEY (`TermId`),
  ADD KEY `ParallelId` (`ParallelId`);

--
-- Indices de la tabla `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `SchoolId` (`SchoolId`),
  ADD KEY `RoleId` (`RoleId`);

--
-- Indices de la tabla `UserDetails`
--
ALTER TABLE `UserDetails`
  ADD PRIMARY KEY (`UserDetailId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indices de la tabla `UserRelatives`
--
ALTER TABLE `UserRelatives`
  ADD PRIMARY KEY (`UserRelativeId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indices de la tabla `User_Options_RoleModule`
--
ALTER TABLE `User_Options_RoleModule`
  ADD PRIMARY KEY (`UserOptionsRoleModuleId`),
  ADD KEY `UserId` (`UserId`,`OptionsId`,`RoleModuleId`),
  ADD KEY `OptionsId` (`OptionsId`),
  ADD KEY `RoleModuleId` (`RoleModuleId`);

--
-- Indices de la tabla `User_Parallel`
--
ALTER TABLE `User_Parallel`
  ADD PRIMARY KEY (`UserParallerId`),
  ADD KEY `UserId` (`UserId`,`ParallelId`),
  ADD KEY `ParallelId` (`ParallelId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Account`
--
ALTER TABLE `Account`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id Accounts AutoIncrements', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Activity`
--
ALTER TABLE `Activity`
  MODIFY `ActivityId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Answer`
--
ALTER TABLE `Answer`
  MODIFY `AnswerId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Block`
--
ALTER TABLE `Block`
  MODIFY `BlockId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Content`
--
ALTER TABLE `Content`
  MODIFY `ContentId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Course`
--
ALTER TABLE `Course`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `CourseCatalog`
--
ALTER TABLE `CourseCatalog`
  MODIFY `CourseCatalogId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datatables_demo`
--
ALTER TABLE `datatables_demo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Discount`
--
ALTER TABLE `Discount`
  MODIFY `DiscountId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `EditorialResource`
--
ALTER TABLE `EditorialResource`
  MODIFY `EditorialResourceId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Events`
--
ALTER TABLE `Events`
  MODIFY `EventId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Exam`
--
ALTER TABLE `Exam`
  MODIFY `ExamId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `ExamDetail`
--
ALTER TABLE `ExamDetail`
  MODIFY `ExamDetailId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Fault`
--
ALTER TABLE `Fault`
  MODIFY `FaultId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `FaultTakenDaily`
--
ALTER TABLE `FaultTakenDaily`
  MODIFY `FaultTakenDailyId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `FaultTemporary`
--
ALTER TABLE `FaultTemporary`
  MODIFY `FaultTemporaryId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `File`
--
ALTER TABLE `File`
  MODIFY `idFile` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ImprovementPlan`
--
ALTER TABLE `ImprovementPlan`
  MODIFY `ImprovementPlanId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Message`
--
ALTER TABLE `Message`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Module`
--
ALTER TABLE `Module`
  MODIFY `ModuleId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements', AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `MTD_Answer`
--
ALTER TABLE `MTD_Answer`
  MODIFY `MTDAnswerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `MTD_Assignment`
--
ALTER TABLE `MTD_Assignment`
  MODIFY `MTDAssignmentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `MTD_Assignment_User`
--
ALTER TABLE `MTD_Assignment_User`
  MODIFY `MTDAssignmentUserId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `MTD_Book`
--
ALTER TABLE `MTD_Book`
  MODIFY `MTDBookId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `MTD_Question`
--
ALTER TABLE `MTD_Question`
  MODIFY `MTDQuestionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `MTD_Quiz`
--
ALTER TABLE `MTD_Quiz`
  MODIFY `MTDQuizId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Notification`
--
ALTER TABLE `Notification`
  MODIFY `NotificationId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Options`
--
ALTER TABLE `Options`
  MODIFY `OptionId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements', AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT de la tabla `Parallel`
--
ALTER TABLE `Parallel`
  MODIFY `ParallelId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Question`
--
ALTER TABLE `Question`
  MODIFY `QuestionId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Quiz`
--
ALTER TABLE `Quiz`
  MODIFY `QuizId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Report`
--
ALTER TABLE `Report`
  MODIFY `ReportId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ResourceCategory`
--
ALTER TABLE `ResourceCategory`
  MODIFY `ResourceCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ResponseSupplyDetail`
--
ALTER TABLE `ResponseSupplyDetail`
  MODIFY `ResponseSupplyDetailId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Role`
--
ALTER TABLE `Role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Role Table Id AutoIncrements', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `Role_Module`
--
ALTER TABLE `Role_Module`
  MODIFY `RoleModuleId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements', AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `School`
--
ALTER TABLE `School`
  MODIFY `SchoolId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `SCUP_ExamDetail`
--
ALTER TABLE `SCUP_ExamDetail`
  MODIFY `SCUPExamDetailId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `SCUP_SD_QT_Answer`
--
ALTER TABLE `SCUP_SD_QT_Answer`
  MODIFY `SCUP_SD_QT_AnswerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `SCUP_SD_QuizTime`
--
ALTER TABLE `SCUP_SD_QuizTime`
  MODIFY `SCUP_SD_QuizTimeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `SCUP_Suppletory`
--
ALTER TABLE `SCUP_Suppletory`
  MODIFY `SCUPSuppletoryDetailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `SCUP_SupplyDetail`
--
ALTER TABLE `SCUP_SupplyDetail`
  MODIFY `SCUPSupplyDetailId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `SC_Exam`
--
ALTER TABLE `SC_Exam`
  MODIFY `SCExamId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `SC_Suppletory`
--
ALTER TABLE `SC_Suppletory`
  MODIFY `SCSuppletoryId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `SC_Supply`
--
ALTER TABLE `SC_Supply`
  MODIFY `SCSupplyId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Section`
--
ALTER TABLE `Section`
  MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `SectionCatalog`
--
ALTER TABLE `SectionCatalog`
  MODIFY `SectionCatalogId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `signature`
--
ALTER TABLE `signature`
  MODIFY `id_sign` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `StudentAgent`
--
ALTER TABLE `StudentAgent`
  MODIFY `StudentAgentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Subject`
--
ALTER TABLE `Subject`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `SubjectCourse_UserParallel`
--
ALTER TABLE `SubjectCourse_UserParallel`
  MODIFY `SubjectCourseUserParallelId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Subject_Course`
--
ALTER TABLE `Subject_Course`
  MODIFY `SubjectCourseId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `Suppletory`
--
ALTER TABLE `Suppletory`
  MODIFY `SuppletoryId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `SuppletoryDetail`
--
ALTER TABLE `SuppletoryDetail`
  MODIFY `SuppletoryDetailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Supply`
--
ALTER TABLE `Supply`
  MODIFY `SupplyId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `SupplyDetail`
--
ALTER TABLE `SupplyDetail`
  MODIFY `SupplyDetailId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `SupplyDetail_Quiz`
--
ALTER TABLE `SupplyDetail_Quiz`
  MODIFY `SupplyDetailQuizId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `TeacherResource`
--
ALTER TABLE `TeacherResource`
  MODIFY `TeacherResourceId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Term`
--
ALTER TABLE `Term`
  MODIFY `TermId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `User`
--
ALTER TABLE `User`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'UserID';

--
-- AUTO_INCREMENT de la tabla `UserDetails`
--
ALTER TABLE `UserDetails`
  MODIFY `UserDetailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `UserRelatives`
--
ALTER TABLE `UserRelatives`
  MODIFY `UserRelativeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `User_Options_RoleModule`
--
ALTER TABLE `User_Options_RoleModule`
  MODIFY `UserOptionsRoleModuleId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- AUTO_INCREMENT de la tabla `User_Parallel`
--
ALTER TABLE `User_Parallel`
  MODIFY `UserParallerId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id AutoIncrements';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Answer`
--
ALTER TABLE `Answer`
  ADD CONSTRAINT `Answer_ibfk_1` FOREIGN KEY (`QuestionId`) REFERENCES `Question` (`QuestionId`);

--
-- Filtros para la tabla `Block`
--
ALTER TABLE `Block`
  ADD CONSTRAINT `Block_ibfk_1` FOREIGN KEY (`TermId`) REFERENCES `Term` (`TermId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Content`
--
ALTER TABLE `Content`
  ADD CONSTRAINT `Content_ibfk_1` FOREIGN KEY (`SubjectCourseId`) REFERENCES `Subject_Course` (`SubjectCourseId`);

--
-- Filtros para la tabla `Course`
--
ALTER TABLE `Course`
  ADD CONSTRAINT `Course_ibfk_1` FOREIGN KEY (`SectionId`) REFERENCES `Section` (`SectionId`);

--
-- Filtros para la tabla `EditorialResource`
--
ALTER TABLE `EditorialResource`
  ADD CONSTRAINT `category-constrain` FOREIGN KEY (`ResourceCategoryId`) REFERENCES `ResourceCategory` (`ResourceCategoryId`),
  ADD CONSTRAINT `course-constrain` FOREIGN KEY (`CourseId`) REFERENCES `Course` (`CourseId`);

--
-- Filtros para la tabla `Events`
--
ALTER TABLE `Events`
  ADD CONSTRAINT `Events_ibfk_1` FOREIGN KEY (`ParallelId`) REFERENCES `Parallel` (`ParallelId`);

--
-- Filtros para la tabla `Exam`
--
ALTER TABLE `Exam`
  ADD CONSTRAINT `Exam_ibfk_1` FOREIGN KEY (`TermId`) REFERENCES `Term` (`TermId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ExamDetail`
--
ALTER TABLE `ExamDetail`
  ADD CONSTRAINT `ExamDetail_ibfk_2` FOREIGN KEY (`SCExamId`) REFERENCES `SC_Exam` (`SCExamId`);

--
-- Filtros para la tabla `Fault`
--
ALTER TABLE `Fault`
  ADD CONSTRAINT `Fault_ibfk_1` FOREIGN KEY (`SCUPId`) REFERENCES `SubjectCourse_UserParallel` (`SubjectCourseUserParallelId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `FaultTakenDaily`
--
ALTER TABLE `FaultTakenDaily`
  ADD CONSTRAINT `FaultTakenDaily_ibfk_1` FOREIGN KEY (`SubjectCourseId`) REFERENCES `Subject_Course` (`SubjectCourseId`),
  ADD CONSTRAINT `FaultTakenDaily_ibfk_2` FOREIGN KEY (`ParallelId`) REFERENCES `Parallel` (`ParallelId`);

--
-- Filtros para la tabla `ImprovementPlan`
--
ALTER TABLE `ImprovementPlan`
  ADD CONSTRAINT `FK_UP_IP` FOREIGN KEY (`UserParallelId`) REFERENCES `User_Parallel` (`UserParallerId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `receiver-constrain` FOREIGN KEY (`MessageReceiver`) REFERENCES `User` (`UserId`) ON DELETE CASCADE,
  ADD CONSTRAINT `sender-constrain` FOREIGN KEY (`MessageSender`) REFERENCES `User` (`UserId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `MTD_Answer`
--
ALTER TABLE `MTD_Answer`
  ADD CONSTRAINT `MTD_Answer_ibfk_1` FOREIGN KEY (`MTDQuestionId`) REFERENCES `MTD_Question` (`MTDQuestionId`);

--
-- Filtros para la tabla `MTD_Assignment`
--
ALTER TABLE `MTD_Assignment`
  ADD CONSTRAINT `MTD_Assignment_ibfk_1` FOREIGN KEY (`MTDQuizId`) REFERENCES `MTD_Quiz` (`MTDQuizId`),
  ADD CONSTRAINT `MTD_Assignment_ibfk_2` FOREIGN KEY (`UserParallerId`) REFERENCES `User_Parallel` (`UserParallerId`);

--
-- Filtros para la tabla `MTD_Assignment_User`
--
ALTER TABLE `MTD_Assignment_User`
  ADD CONSTRAINT `MTD_Assignment_User_ibfk_1` FOREIGN KEY (`MTDAssignmentId`) REFERENCES `MTD_Assignment` (`MTDAssignmentId`),
  ADD CONSTRAINT `MTD_Assignment_User_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `User` (`UserId`);

--
-- Filtros para la tabla `MTD_Book`
--
ALTER TABLE `MTD_Book`
  ADD CONSTRAINT `MTD_Book_ibfk_1` FOREIGN KEY (`SubjectCourseId`) REFERENCES `Subject_Course` (`SubjectCourseId`);

--
-- Filtros para la tabla `MTD_Question`
--
ALTER TABLE `MTD_Question`
  ADD CONSTRAINT `MTD_Question_ibfk_1` FOREIGN KEY (`MTDQuizId`) REFERENCES `MTD_Quiz` (`MTDQuizId`);

--
-- Filtros para la tabla `MTD_Quiz`
--
ALTER TABLE `MTD_Quiz`
  ADD CONSTRAINT `MTD_Quiz_ibfk_1` FOREIGN KEY (`SubjectCourseId`) REFERENCES `Subject_Course` (`SubjectCourseId`);

--
-- Filtros para la tabla `Options`
--
ALTER TABLE `Options`
  ADD CONSTRAINT `Options_ibfk_1` FOREIGN KEY (`ModuleId`) REFERENCES `Module` (`ModuleId`);

--
-- Filtros para la tabla `Parallel`
--
ALTER TABLE `Parallel`
  ADD CONSTRAINT `Parallel_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `Course` (`CourseId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Question`
--
ALTER TABLE `Question`
  ADD CONSTRAINT `Question_ibfk_1` FOREIGN KEY (`QuizId`) REFERENCES `Quiz` (`QuizId`);

--
-- Filtros para la tabla `ResponseSupplyDetail`
--
ALTER TABLE `ResponseSupplyDetail`
  ADD CONSTRAINT `ResponseSupplyDetail_ibfk_1` FOREIGN KEY (`SupplyDetailId`) REFERENCES `SupplyDetail` (`SupplyDetailId`) ON DELETE CASCADE,
  ADD CONSTRAINT `ResponseSupplyDetail_ibfk_2` FOREIGN KEY (`SubjectCourseUserParallelId`) REFERENCES `SubjectCourse_UserParallel` (`SubjectCourseUserParallelId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Role_Module`
--
ALTER TABLE `Role_Module`
  ADD CONSTRAINT `Role_Module_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `Role` (`RoleId`),
  ADD CONSTRAINT `Role_Module_ibfk_2` FOREIGN KEY (`ModuleId`) REFERENCES `Module` (`ModuleId`);

--
-- Filtros para la tabla `School`
--
ALTER TABLE `School`
  ADD CONSTRAINT `School_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `Account` (`AccountId`);

--
-- Filtros para la tabla `SCUP_ExamDetail`
--
ALTER TABLE `SCUP_ExamDetail`
  ADD CONSTRAINT `SCUP_ExamDetail_ibfk_1` FOREIGN KEY (`ExamDetailId`) REFERENCES `ExamDetail` (`ExamDetailId`) ON DELETE CASCADE,
  ADD CONSTRAINT `SCUP_ExamDetail_ibfk_2` FOREIGN KEY (`SubjectCourseUserParallelId`) REFERENCES `SubjectCourse_UserParallel` (`SubjectCourseUserParallelId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `SCUP_SD_QT_Answer`
--
ALTER TABLE `SCUP_SD_QT_Answer`
  ADD CONSTRAINT `SCUP_SD_QT_Answer_ibfk_1` FOREIGN KEY (`SCUP_SD_QuizTimeId`) REFERENCES `SCUP_SD_QuizTime` (`SCUP_SD_QuizTimeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SCUP_SD_QT_Answer_ibfk_2` FOREIGN KEY (`AnswerId`) REFERENCES `Answer` (`AnswerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `SCUP_SD_QuizTime`
--
ALTER TABLE `SCUP_SD_QuizTime`
  ADD CONSTRAINT `SCUP_SD_QuizTime_ibfk_1` FOREIGN KEY (`SCUPSupplyDetailId`) REFERENCES `SCUP_SupplyDetail` (`SCUPSupplyDetailId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `SCUP_Suppletory`
--
ALTER TABLE `SCUP_Suppletory`
  ADD CONSTRAINT `SCUP_Suppletory_ibfk_1` FOREIGN KEY (`SuppletoryDetailId`) REFERENCES `SuppletoryDetail` (`SuppletoryDetailId`) ON DELETE CASCADE,
  ADD CONSTRAINT `SCUP_Suppletory_ibfk_2` FOREIGN KEY (`SubjectCourseUserParallelId`) REFERENCES `SubjectCourse_UserParallel` (`SubjectCourseUserParallelId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `SCUP_SupplyDetail`
--
ALTER TABLE `SCUP_SupplyDetail`
  ADD CONSTRAINT `SCUP_SupplyDetail_ibfk_1` FOREIGN KEY (`SubjectCourseUserParallelId`) REFERENCES `SubjectCourse_UserParallel` (`SubjectCourseUserParallelId`) ON DELETE CASCADE,
  ADD CONSTRAINT `SCUP_SupplyDetail_ibfk_2` FOREIGN KEY (`SupplyDetailId`) REFERENCES `SupplyDetail` (`SupplyDetailId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `SC_Exam`
--
ALTER TABLE `SC_Exam`
  ADD CONSTRAINT `SC_Exam_ibfk_1` FOREIGN KEY (`SubjectCourseId`) REFERENCES `Subject_Course` (`SubjectCourseId`) ON DELETE CASCADE,
  ADD CONSTRAINT `SC_Exam_ibfk_2` FOREIGN KEY (`ExamId`) REFERENCES `Exam` (`ExamId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `SC_Suppletory`
--
ALTER TABLE `SC_Suppletory`
  ADD CONSTRAINT `SC_Suppletory_ibfk_1` FOREIGN KEY (`SuppletoryId`) REFERENCES `Suppletory` (`SuppletoryId`) ON DELETE CASCADE,
  ADD CONSTRAINT `SC_Suppletory_ibfk_2` FOREIGN KEY (`SubjectCourseId`) REFERENCES `Subject_Course` (`SubjectCourseId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `SC_Supply`
--
ALTER TABLE `SC_Supply`
  ADD CONSTRAINT `SC_Supply_ibfk_1` FOREIGN KEY (`SubjectCourseId`) REFERENCES `Subject_Course` (`SubjectCourseId`) ON DELETE CASCADE,
  ADD CONSTRAINT `SC_Supply_ibfk_2` FOREIGN KEY (`SupplyId`) REFERENCES `Supply` (`SupplyId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Section`
--
ALTER TABLE `Section`
  ADD CONSTRAINT `Section_ibfk_1` FOREIGN KEY (`SchoolId`) REFERENCES `School` (`SchoolId`);

--
-- Filtros para la tabla `signature`
--
ALTER TABLE `signature`
  ADD CONSTRAINT `signature_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `User` (`UserId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `Subject`
--
ALTER TABLE `Subject`
  ADD CONSTRAINT `Subject_ibfk_1` FOREIGN KEY (`SchoolId`) REFERENCES `School` (`SchoolId`);

--
-- Filtros para la tabla `SubjectCourse_UserParallel`
--
ALTER TABLE `SubjectCourse_UserParallel`
  ADD CONSTRAINT `SubjectCourse_UserParallel_ibfk_1` FOREIGN KEY (`SubjectCourseId`) REFERENCES `Subject_Course` (`SubjectCourseId`) ON DELETE CASCADE,
  ADD CONSTRAINT `SubjectCourse_UserParallel_ibfk_2` FOREIGN KEY (`UserParallelId`) REFERENCES `User_Parallel` (`UserParallerId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Subject_Course`
--
ALTER TABLE `Subject_Course`
  ADD CONSTRAINT `Subject_Course_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `Course` (`CourseId`),
  ADD CONSTRAINT `Subject_Course_ibfk_2` FOREIGN KEY (`SubjectId`) REFERENCES `Subject` (`SubjectId`);

--
-- Filtros para la tabla `Suppletory`
--
ALTER TABLE `Suppletory`
  ADD CONSTRAINT `Suppletory_ibfk_1` FOREIGN KEY (`ParallelId`) REFERENCES `Parallel` (`ParallelId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `SuppletoryDetail`
--
ALTER TABLE `SuppletoryDetail`
  ADD CONSTRAINT `SuppletoryDetail_ibfk_1` FOREIGN KEY (`SCSuppletoryId`) REFERENCES `SC_Suppletory` (`SCSuppletoryId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Supply`
--
ALTER TABLE `Supply`
  ADD CONSTRAINT `Supply_ibfk_1` FOREIGN KEY (`BlockId`) REFERENCES `Block` (`BlockId`) ON DELETE CASCADE,
  ADD CONSTRAINT `Supply_ibfk_2` FOREIGN KEY (`ActivityId`) REFERENCES `Activity` (`ActivityId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `SupplyDetail`
--
ALTER TABLE `SupplyDetail`
  ADD CONSTRAINT `SupplyDetail_ibfk_2` FOREIGN KEY (`SCSupplyId`) REFERENCES `SC_Supply` (`SCSupplyId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `SupplyDetail_Quiz`
--
ALTER TABLE `SupplyDetail_Quiz`
  ADD CONSTRAINT `SupplyDetail_Quiz_ibfk_1` FOREIGN KEY (`QuizId`) REFERENCES `Quiz` (`QuizId`),
  ADD CONSTRAINT `SupplyDetail_Quiz_ibfk_2` FOREIGN KEY (`SupplyDetailId`) REFERENCES `SupplyDetail` (`SupplyDetailId`);

--
-- Filtros para la tabla `TeacherResource`
--
ALTER TABLE `TeacherResource`
  ADD CONSTRAINT `c3` FOREIGN KEY (`ResourceCategoryId`) REFERENCES `ResourceCategory` (`ResourceCategoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectcourse-constrain` FOREIGN KEY (`SubjectCourseId`) REFERENCES `Subject_Course` (`SubjectCourseId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userparallel-constrain` FOREIGN KEY (`UserParallelId`) REFERENCES `User_Parallel` (`UserParallerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Term`
--
ALTER TABLE `Term`
  ADD CONSTRAINT `Term_ibfk_1` FOREIGN KEY (`ParallelId`) REFERENCES `Parallel` (`ParallelId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`SchoolId`) REFERENCES `School` (`SchoolId`),
  ADD CONSTRAINT `User_ibfk_2` FOREIGN KEY (`RoleId`) REFERENCES `Role` (`RoleId`);

--
-- Filtros para la tabla `UserDetails`
--
ALTER TABLE `UserDetails`
  ADD CONSTRAINT `UserDetails_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `UserRelatives`
--
ALTER TABLE `UserRelatives`
  ADD CONSTRAINT `userrelatives_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `User_Options_RoleModule`
--
ALTER TABLE `User_Options_RoleModule`
  ADD CONSTRAINT `User_Options_RoleModule_ibfk_1` FOREIGN KEY (`OptionsId`) REFERENCES `Options` (`OptionId`),
  ADD CONSTRAINT `User_Options_RoleModule_ibfk_2` FOREIGN KEY (`RoleModuleId`) REFERENCES `Role_Module` (`RoleModuleId`),
  ADD CONSTRAINT `User_Options_RoleModule_ibfk_3` FOREIGN KEY (`UserId`) REFERENCES `User` (`UserId`);

--
-- Filtros para la tabla `User_Parallel`
--
ALTER TABLE `User_Parallel`
  ADD CONSTRAINT `User_Parallel_ibfk_1` FOREIGN KEY (`ParallelId`) REFERENCES `Parallel` (`ParallelId`) ON DELETE CASCADE,
  ADD CONSTRAINT `User_Parallel_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE;
COMMIT;
