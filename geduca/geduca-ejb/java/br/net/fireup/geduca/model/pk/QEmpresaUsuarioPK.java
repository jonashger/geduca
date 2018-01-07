package br.net.fireup.geduca.model.pk;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QEmpresaUsuarioPK is a Querydsl query type for EmpresaUsuarioPK
 */
@Generated("com.mysema.query.codegen.EmbeddableSerializer")
public class QEmpresaUsuarioPK extends BeanPath<EmpresaUsuarioPK> {

    private static final long serialVersionUID = -2076909701L;

    public static final QEmpresaUsuarioPK empresaUsuarioPK = new QEmpresaUsuarioPK("empresaUsuarioPK");

    public final NumberPath<Long> codigoEmpresa = createNumber("codigoEmpresa", Long.class);

    public final NumberPath<Long> codigoPessoa = createNumber("codigoPessoa", Long.class);

    public QEmpresaUsuarioPK(String variable) {
        super(EmpresaUsuarioPK.class, forVariable(variable));
    }

    public QEmpresaUsuarioPK(Path<? extends EmpresaUsuarioPK> path) {
        super(path.getType(), path.getMetadata());
    }

    public QEmpresaUsuarioPK(PathMetadata<?> metadata) {
        super(EmpresaUsuarioPK.class, metadata);
    }

}

