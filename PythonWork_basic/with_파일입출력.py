import pickle

# with open('profile.pickle','rb') as profile_file:
#     print(pickle.load(profile_file)) # with는 close로 닫아 주지 않아도 된다.

# with open('study.txt','w',encoding='utf8') as study_file :
#     study_file.write('파이썬을 열심히 공부하고 있어요 ')

# with open('study.txt','r',encoding='utf8') as study_files :
#     print(study_files.read())  

for week in range(1,51) :
    with open(str(week)+'주차.txt','w',encoding='utf8') as report :
        report.write('-{0} 주차 주간보고-\n부서:\n이름:\n업무요약:'.format(week))
    



