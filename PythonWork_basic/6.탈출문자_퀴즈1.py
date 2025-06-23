print('백문이 불여일견 \n 백견이 불여일타') #\n은 줄바꿈 문자다.
print("백문이 \"불여일견\"  백견이 불여일타") # 중간에 큰(작은)따옴표를 또써야 할때  앞에 역슬러시를 넣어주면된다.
print('C:\\Users\\82102\\Documents\\GitHub') # \ 하나만 입력시 오류가 발생되며 \\두번을 넣어야 된다.

# \r : 커서를 맽 앞으로 이동
print("red apple\rpine") #\r뒤 입력문자를 앞으로 이동시킴 pineapple

# \b : 백스페이트 (한 글자 삭제 )
print("Redd\bApple") # \b는 직전에 한글자를 삭제한다.

# password = 'http://naver.com'
# rule1 =password.replace('http://','')
# print(rule1)
# rule2Idx = rule1.index('.')
# print(rule2Idx)
# rule2 = rule1[0:rule2Idx]
# print(rule2)
# print(rule2[0:3])
# print(len(rule2))
# print(rule2.count('e'))
# passwordEnd =rule2[0:3]+str(len(rule2))+str(rule2.count('e'))+'!'
# print(passwordEnd)
# print('{0}의 비밀번호는 {1}입니다.'.format(password,passwordEnd))

password = "http://www.gmarket.co.kr"
rule1 = password.replace("http://www.","")
print(rule1)
dotidx = rule1.index(".")
rule2 = rule1[0:dotidx]
rule3 = rule2[0:3]
length = len(rule2)
print("생성된 비밀번호 : {0}".format(rule3+str(length)+"!"))

def test(para):
    print(para)
    

test('김정훈병신')
    