Figure 1 :Details of patient dental appointments.
Staff Table:
| staffNo | dentistName  |
|---------|--------------|
| S1011   | Tony Smith   |
| S1024   | Helen Pearson|
| S1032   | Robin Plevin |

Patient Table:
| patientNo | patientName  |
|-----------|--------------|
| P100      | Gillian White|
| P105      | Jill Bell    |
| P108      | Ian MacKay   |
| P110      | John Walker  |

| appointmentDate | appointmentTime | patientNo | staffNo | surgeryNo |
|-----------------|-----------------|-----------|---------|-----------|
| 12-Aug-03       | 10.00           | P100      | S1011   | S10       |
| 13-Aug-03       | 12.00           | P105      | S1011   | S15       |
| 12-Sept-03      | 10.00           | P108      | S1024   | S10       |
| 14-Sept-03      | 10.00           | P108      | S1024   | S10       |
| 14-Oct-03       | 16.30           | P105      | S1032   | S15       |
| 15-Oct-03       | 18.00           | P110      | S1032   | S13       |





Figure 2 : Employees of InstantCover and their contracts to work at hotels.
Employee Table:
| NIN       | eName       |
|----------|--------------|
| 113567WD | John Smith   |
| 234111XA | Diane Hocine |
| 712670YD | Sarah White  |

Contract Table:
| contractNo | NIN      | hoursPerWeek |
|------------|----------|--------------|
| C1024      | 113567WD | 16           |
| C1024      | 234111XA | 24           |
| C1025      | 712670YD | 28           |
| C1025      | 113567WD | 16           |

Hotel Table:
| hotelNo | hotelLocation |
|---------|---------------|
| H25     | Edinburgh     |
| H4      | Glasgow       |





Figure 3 : Employees , jobs and states
Employees Table:
| EMPLOYEE_ID | NAME | STATE_CODE | HOME_STATE |
|-------------|------|------------|------------|
| E001        | Alice| 26         | Michigan   |
| E002        | Bob  | 56         | Wyoming    |
| E003        | Alice| 56         | Wyoming    |

Jobs Table:
| JOB_CODE | JOB      |
|----------|----------|
| J01      | Chef     |
| J02      | Waiter   |
| J03      | Bartender|

States Table:
| STATE_CODE | HOME_STATE |
|------------|------------|
| 26         | Michigan   |
| 56         | Wyoming    |

Employee Jobs Table:
| EMPLOYEE_ID | JOB_CODE |
|-------------|----------|
| E001        | J01      |
| E001        | J02      |
| E002        | J02      |
| E002        | J03      |
| E003        | J01      |





Figure 4 : Units,Tutors and Students Grades
Units Table:
| UnitID | Topic | Room |
|--------|-------|------|
| U1     | GMT   | 629  |
| U2     | GIn   | 631  |
| U5     | PhF   | 632  |
| U4     | AVQ   | 621  |

Tutors Table:
| TutorID | TutEmail    | Book      |
|---------|-------------|-----------|
| Tut1    | tut1@fhbb.ch| Deumlich  |
| Tut3    | tut3@fhbb.ch| Dümmelrs  |
| Tut5    | tut5@fhbb.ch| SwissTopo |

Students Grades Table:
| StudentID | UnitID | Topic  | Date     | TutorID | Grade |
|-----------|--------|--------|----------|---------|-------|
| St1       | U1     | GMT    | 23.02.03 | Tut1    | 4.7   |
| St1       | U2     | GIn    | 18.11.02 | Tut3    | 5.1   |
| St4       | U1     | GMT    | 23.02.03 | Tut1    | 4.3   |
| St2       | U5     | PhF    | 05.05.03 | Tut3    | 4.9   |
| St2       | U4     | AVQ    | 04.07.03 | Tut5    | 5.0   |


Figure 5 ：Books of genre and authors
Books Table:
| Book                                  | Genre                   |
|---------------------------------------|-------------------------|
| Twenty Thousand Leagues Under the Sea | Science Fiction         |
| Journey to the Center of the Earth    | Science Fiction         |
| Leaves of Grass                       | Poetry                  |
| Anna Karenina                         | Literary Fiction        |
| A Confession                          | Religious Autobiography |

Authors Table:
| Author      | Author Nationality |
|-------------|--------------------|
| Jules Verne | French             |
| Walt Whitman| American           |
| Leo Tolstoy | Russian            |

Book-Author Link Table:
| Book                                  | Author      |
|---------------------------------------|-------------|
| Twenty Thousand Leagues Under the Sea | Jules Verne |
| Journey to the Center of the Earth    | Jules Verne |
| Leaves of Grass                       | Walt Whitman|
| Anna Karenina                         | Leo Tolstoy |
| A Confession                          | Leo Tolstoy |




