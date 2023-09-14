#출석번호
students =[] 
for student in range(1,7) :
  students.append(student)
 # print(students)
print(students)

students =[1,2,3,4,5]
students =[i+100 for i in students] #어우 헷갈려 
print(students)

#학생 이름을 길이로 변환

students = ['iron man','thor','i am groot']

students = [len(i) for i in students]
print(students)

students = [ str(i).upper() for i in students] # 숫자를 upper로 만드니 당연히 에러
print(students)

#한줄for는 리스트로 묶고 for앞에 나타낼 결과값이 나오게 입력하는 것이다.



