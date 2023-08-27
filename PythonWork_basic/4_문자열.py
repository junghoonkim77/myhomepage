jumin = "771120-1047118"
# 슬라이싱
# print('김정훈의 성별은:'+ jumin[7])
# print('김정훈은'+jumin[0:2]+"에 태어났따")
# print('김정훈은'+jumin[2:4]+"월에 태어났다.")
print('김정훈의 생년월일은'+jumin[:7]+"입니다.") #처음부터 인덱스 7까지 
print('김정훈의 주민번호 뒷자리는'+jumin[7:]+"입니다.") #7번인덱스부터 끝까지
print('김정훈의 주민번호 뒷자리는'+jumin[-7:]+"입니다.") #뒷자리 부터 불러오기 -1이 제일 뒷자리임

python ="Python os Amazing"
print(python.lower()) 
print(python.upper())
print(python[0].isupper()) #몇번째 인덱스가 대문자가 맞느냐 True False를 반환
print(len(python))
print(python.replace("Python","java"))
index = python.index('n')
print(index)
index = python.index('n',index+1) #위에 방법대로 하면 첫번째 n의 위치만 나옴으로 두번째 n의 위지를 알고 싶을때 
print(python.count('n'))


