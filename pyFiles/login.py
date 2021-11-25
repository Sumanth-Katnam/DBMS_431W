def login(userName, password):
    error = None
    if userName.lower() == 'admin':
        error = (password != 'admin')
    else:
        error = False
    return error