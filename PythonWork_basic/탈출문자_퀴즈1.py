print('백문이 불여일견 \n 백견이 불여일타') #\n은 줄바꿈 문자다.
print("백문이 \"불여일견\"  백견이 불여일타") # \" , \'  ""를 이중으로 사용할떄
print('C:\\Users\\82102\\Documents\\GitHub') # \ 하나만 입력시 오류가 발생되며 \\두번을 넣어야 된다.

password = 'http://naver.com'
rule1 =password.replace('http://','')
print(rule1)
rule2Idx = rule1.index('.')
print(rule2Idx)
rule2 = rule1[0:rule2Idx]
print(rule2)
print(rule2[0:3])
print(len(rule2))
print(rule2.count('e'))
passwordEnd =rule2[0:3]+str(len(rule2))+str(rule2.count('e'))+'!'
print(passwordEnd)
print('{0}의 비밀번호는 {1}입니다.'.format(password,passwordEnd))