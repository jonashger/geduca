package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;
import com.mysema.query.types.path.PathInits;


/**
 * QEmpresaUsuario is a Querydsl query type for EmpresaUsuario
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QEmpresaUsuario extends EntityPathBase<EmpresaUsuario> {

    private static final long serialVersionUID = 176403677L;

    private static final PathInits INITS = PathInits.DIRECT2;

    public static final QEmpresaUsuario empresaUsuario = new QEmpresaUsuario("empresaUsuario");

    public final NumberPath<Long> codigoFuncao = createNumber("codigoFuncao", Long.class);

    public final br.net.fireup.geduca.model.pk.QEmpresaUsuarioPK id;

    public QEmpresaUsuario(String variable) {
        this(EmpresaUsuario.class, forVariable(variable), INITS);
    }

    public QEmpresaUsuario(Path<? extends EmpresaUsuario> path) {
        this(path.getType(), path.getMetadata(), path.getMetadata().isRoot() ? INITS : PathInits.DEFAULT);
    }

    public QEmpresaUsuario(PathMetadata<?> metadata) {
        this(metadata, metadata.isRoot() ? INITS : PathInits.DEFAULT);
    }

    public QEmpresaUsuario(PathMetadata<?> metadata, PathInits inits) {
        this(EmpresaUsuario.class, metadata, inits);
    }

    public QEmpresaUsuario(Class<? extends EmpresaUsuario> type, PathMetadata<?> metadata, PathInits inits) {
        super(type, metadata, inits);
        this.id = inits.isInitialized("id") ? new br.net.fireup.geduca.model.pk.QEmpresaUsuarioPK(forProperty("id")) : null;
    }

}

